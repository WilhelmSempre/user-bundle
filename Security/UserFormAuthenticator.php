<?php

namespace WilhelmSempre\UserBundle\Security\Firewall\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\SimpleFormAuthenticatorInterface;
use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\Security\Provider\AuthorizationProvider;
use WilhelmSempre\UserBundle\Security\Token\UserTwoFactorToken;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Firewall\Http\TwoFactorAuthorizationRoleAssigner;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorUserRoleManagerFactory;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationRequiredUserRoleType;

/**
 * Class UserFormAuthenticator
 * @package WilhelmSempre\UserBundle\Security\Firewall\Http
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class UserFormAuthenticator implements SimpleFormAuthenticatorInterface
{

    /**
     * @var TwoFactorUserRoleManagerFactory
     */
    public $factorUserRoleManagerFactory;

    /**
     * UserFormAuthenticator constructor.
     * @param TwoFactorUserRoleManagerFactory $factorUserRoleManagerFactory
     */
    public function __construct(TwoFactorUserRoleManagerFactory $factorUserRoleManagerFactory)
    {
        $this->factorUserRoleManagerFactory = $factorUserRoleManagerFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function createToken(Request $request, $username, $password, $providerKey)
    {
        return new UsernamePasswordToken($username, $password, $providerKey);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey)
    {
        $usernameFromToken = $token->getUsername();

        /** @var User $user */
        $user = $userProvider->loadUserByUsername($usernameFromToken);

        $credentials = $token->getCredentials();

        $twoFactorAuthorizationMethod = $user->getTwoFactorAuthorizationMethod();

        $userRoles = $this->factorUserRoleManagerFactory
            ->getManager($twoFactorAuthorizationMethod)
            ->addUserRole($user)
        ;

        return new UsernamePasswordToken($user, $credentials, $providerKey, $userRoles);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsToken(TokenInterface $token, $providerKey)
    {
        $isTheSameProviderKey = method_exists($token, 'getProviderKey')
            && $token->getProviderKey() === $providerKey;

        return $token instanceof UsernamePasswordToken && $isTheSameProviderKey;
    }
}