<?php

namespace WilhelmSempre\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;
use WilhelmSempre\UserBundle\Form\TwoFactorCodeType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use WilhelmSempre\UserBundle\Form\LoginType;
use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\Services\TokenService;
use WilhelmSempre\UserBundle\Services\UserService;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleManagerInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorUserRoleManagerFactoryInterface;

/**
 * Class AbstractSecurityController
 * @package WilhelmSempre\UserBundle\Controller
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class AbstractSecurityController extends Controller
{

    /**
     * @Route("/login", name="login")
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    final public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
        /** @var UserInterface $user */
        $user = $this->getUser();

        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('homepage');
        }

        $loginForm = $this->createForm(LoginType::class);

        $templateParams = [
            'loginForm' => $loginForm->createView(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ];

        return $this->render('@User/Login/index.html.twig', $templateParams);
    }

    /**
     * @Route("/logout", name="logout")
     *
     * @return Response
     */
    final public function logoutAction(): Response
    {
        return new Response();
    }


    /**
     * @Route("/mail", name="authorization-mail")
     *
     * @param Request $request
     * @param UserService $userService
     * @param TranslatorInterface $translator
     * @param TwoFactorUserRoleManagerFactoryInterface $twoFactorUserRoleManagerFactory
     * @return Response
     */
    final public function mailAction(Request $request, UserService $userService, TranslatorInterface $translator, TokenService $tokenService): Response
    {
        $isTwoFactorAuthorizationRequired = $tokenService->tokenRequiresTwoFactorAuthentication();

        if (!$isTwoFactorAuthorizationRequired) {
            return $this->redirectToRoute('homepage');
        }

        /** @var UserInterface $user */
        $user = $this->getUser();

        $twoFactorForm = $this->createForm(TwoFactorCodeType::class);

        $twoFactorForm->handleRequest($request);

        if ($twoFactorForm->isValid()) {
            $mailTwoFactorAuthorizationProvider = $userService->createMailTwoFactorAuthorizationProvider();

            $codeFromEmail = $request->request
                ->get('_code')
            ;

            $codeFromEmailEncoded = sha1($codeFromEmail);

            $isCodeValid = $mailTwoFactorAuthorizationProvider->getTwoFactorAuthorizationValidator()
                ->isValid($codeFromEmailEncoded, $user, $userService)
            ;

            if (!$isCodeValid) {
                $invalidCodeErrorMessage = $translator->trans('two.factor.errors.code.invalid', [], '2f');

                $twoFactorForm->get('_code')
                    ->addError(
                        new FormError($invalidCodeErrorMessage)
                    )
                ;
            } else {
                $redirectRoute = $this->getParameter('wilhelmsempre.user.redirect_after_authorization_route');

                if (!$redirectRoute) {
                    $redirectRoute = $request->getRequestUri();
                }

                $user = $tokenService->removeRoleFromToken($user);
                $tokenService->renewToken($user);

                return $this->redirectToRoute($redirectRoute);
            }
        }

        return $this->render('@User/Login/2F/Mail/2f.html.twig', [
            'errors' => $twoFactorForm->getErrors(),
            'twoFactorForm' => $twoFactorForm->createView(),
            'email' => $user->getEmail(),
        ]);
    }

    /**
     * @Route("/google-authenticator", name="authorization-google-authenticator")
     * @Method("GET")
     *
     * @return Response
     */
    final public function googleAuthenticatorAction(): Response
    {
        $isTwoFactorAuthorizationRequired = $tokenService->tokenRequiresTwoFactorAuthentication();

        if (!$isTwoFactorAuthorizationRequired) {
            return $this->redirectToRoute('homepage');
        }

        $twoFactorForm = $this->createForm(TwoFactorCodeType::class);

        return $this->render('@User/Login/2F/GoogleAuthenticator/2f.html.twig', [
            'error' => '',
            'twoFactorForm' => $twoFactorForm->createView(),
        ]);
    }
}