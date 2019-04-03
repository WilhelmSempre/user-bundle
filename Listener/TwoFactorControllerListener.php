<?php

namespace WilhelmSempre\UserBundle\Listener;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security\FirewallMap;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Role\Role;
use WilhelmSempre\UserBundle\Controller\AbstractSecurityController;
use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\Services\Mailing\TwoFactorAuthorizationCodeMailer;
use WilhelmSempre\UserBundle\Services\UserService;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\Plain\TwoFactorAuthorizationPlainPrinter;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\Mail\MailValidator;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator\GoogleAuthenticatorRoleManager;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail\MailRoleManager;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleManagerInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\TwoFactorAuthorization;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;

/**
 * Class TwoFactorControllerListener
 * @package WilhelmSempre\UserBundle\Listener
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorControllerListener
{

    /**
     * @var TokenInterface
     */
    private $tokenStorage;

    /**
     * @var RouterInterface
     */
    private $route;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var TwoFactorAuthorizationCodeMailer
     */
    private $twoFactorAuthorizationCodeMailer;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * TwoFactorControllerListener constructor.
     * @param TokenInterface $tokenStorage
     */
    public function __construct(TokenStorage $tokenStorage, RouterInterface $router, ContainerInterface $container, TwoFactorAuthorizationCodeMailer $twoFactorAuthorizationCodeMailer, UserService $userService)
    {
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
        $this->container = $container;
        $this->twoFactorAuthorizationCodeMailer = $twoFactorAuthorizationCodeMailer;
        $this->userService = $userService;
    }

    /**
     * @param FilterControllerEvent $event
     * @return RedirectResponse|bool
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationPrinterException
     */
    public function createTwoFactorAuthorization(FilterControllerEvent $event): RedirectResponse
    {
        $controller = $event->getController();

        $requestURI = $event->getRequest()
            ->getRequestUri()
        ;

        $excludedRoutes = [
            'login',
            'logout',
            'authorization-mail',
            'authorization-google-authenticator'
        ];

        $routeName = $event->getRequest()
            ->get('_route')
        ;

        /** @var TokenInterface $token */
        $token = $this->tokenStorage->getToken();

        if (
            null === $routeName ||
            true === in_array($routeName, $excludedRoutes) ||
            false === is_array($controller) ||
            false === $token instanceof UsernamePasswordToken
        ) {
            return new RedirectResponse($requestURI);
        }

        $tokenRoles = array_map(function (Role $role) {
            return $role->getRole();
        }, $token->getRoles());

        if (true === in_array(GoogleAuthenticatorRoleManager::AUTHORIZATION_ROLE, $tokenRoles)) {
            $route = $this->router
                ->generate('authorization-google-authenticator')
            ;
        } else if (true === in_array(MailRoleManager::AUTHORIZATION_ROLE, $tokenRoles)) {
            $code = $this->createMailAuthorizationMethodCode();

            $this->sendMailWithCode($code, $token);

            /** @var UserInterface $user */
            $user = $token->getUser();

            $token = sha1($code);
            
            $this->userService
                ->setUserToken($user, $token)
            ;

            $route = $this->router
                ->generate('authorization-mail')
            ;

            $event->setController(function () use ($route) {
                return new RedirectResponse($route);
            });
        }

        return new RedirectResponse($requestURI);
    }

    /**
     * @return string
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationPrinterException
     */
    private function createMailAuthorizationMethodCode(): string
    {

        $mailTwoFactorAuthorizationProvider = $this->userService
            ->createMailTwoFactorAuthorizationProvider()
        ;

        $code = $mailTwoFactorAuthorizationProvider
            ->getTwoFactorAuthorizationPrinter()
            ->getTwoFactorAuthorizationCode()
        ;

        return $code;
    }

    /**
     * @param string $code
     * @param TokenInterface $token
     * @return TwoFactorControllerListener
     */
    private function sendMailWithCode(string $code, TokenInterface $token): self
    {
        $this->twoFactorAuthorizationCodeMailer
            ->sendAuthorizationCode($code, $token->getUser())
        ;

        return $this;
    }


}
