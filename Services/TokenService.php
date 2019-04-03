<?php

namespace WilhelmSempre\UserBundle\Services;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator\GoogleAuthenticatorRoleManager;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail\MailRoleManager;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorUserRoleManagerFactory;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Role\Role;

/**
 * Class TokenService
 * @package WilhelmSempre\UserBundle\Services
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TokenService
{

    /**
     * @var TokenInterface
     */
    private $token;

    /**
     * @var TwoFactorUserRoleManagerFactory
     */
    private $twoFactorUserRoleManagerFactory;

    /**
     * TokenService constructor.
     * @param TokenInterface $token
     */
    public function __construct(TokenStorage $token, TwoFactorUserRoleManagerFactory $twoFactorUserRoleManagerFactory)
    {
        $this->token = $token;
        $this->twoFactorUserRoleManagerFactory = $twoFactorUserRoleManagerFactory;
    }

    /**
     * @param string|UserInterface $username
     * @param string $password
     * @param string $providerKey
     * @param array $userRoles
     * @return UsernamePasswordToken
     */
    public function createToken($username, string $password, string $providerKey, array $userRoles = []): UsernamePasswordToken
    {
        return new UsernamePasswordToken($username, $password, $providerKey, $userRoles);
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException
     */
    public function addRoleToToken(UserInterface $user): UserInterface
    {
        $twoFactorAuthorizationMethod = $user->getTwoFactorAuthorizationMethod();

        $userRoles = $user->getRoles();

        if (null !== $twoFactorAuthorizationMethod) {
            $userRoles = $this->twoFactorUserRoleManagerFactory
                ->getManager($twoFactorAuthorizationMethod)
                ->addUserRole($user)
            ;

            $user->setRoles($userRoles);

            return $user;
        }
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException
     */
    public function removeRoleFromToken(UserInterface $user): UserInterface
    {
        $twoFactorAuthorizationMethod = $user->getTwoFactorAuthorizationMethod();

        $userRoles = $user->getRoles();

        if (null !== $twoFactorAuthorizationMethod) {
            $userRoles = $this->twoFactorUserRoleManagerFactory
                ->getManager($twoFactorAuthorizationMethod)
                ->removeUserRole($user);
            ;

            $user->setRoles($userRoles);

            return $user;
        }
    }

    /**
     * @param TokenInterface $token
     * @param UserInterface $user
     * @return UsernamePasswordToken
     */
    public function renewToken(UserInterface $user): UsernamePasswordToken
    {
        $token = $this->token
            ->getToken()
        ;

        $credentials = $user->getPassword();
        $providerKey = $token->getProviderKey();

        $userRoles = $user->getRoles();

        $token = $this->createToken($user, $credentials, $providerKey, $userRoles);

        $this->token
            ->setToken($token);

        return $token;
    }

    /**
     * @return bool
     */
    public function tokenRequiresTwoFactorAuthentication(): bool
    {
        $token = $this->token->getToken();

        $tokenRoles = array_map(function (Role $role) {
            return $role->getRole();
        }, $token->getRoles());

        if (in_array(MailRoleManager::AUTHORIZATION_ROLE, $tokenRoles)) {
            return true;
        }

        if (in_array(GoogleAuthenticatorRoleManager::AUTHORIZATION_ROLE, $tokenRoles)) {
            return true;
        }

        return false;
    }
}