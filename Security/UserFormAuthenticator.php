<?php

namespace WilhelmSempre\UserBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\SimpleFormAuthenticatorInterface;
use WilhelmSempre\UserBundle\Model\User;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use WilhelmSempre\UserBundle\Security\Provider\AuthorizationProvider;
use WilhelmSempre\UserBundle\Security\Token\UserTwoFactorToken;
use WilhelmSempre\UserBundle\Services\TokenService;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorUserRoleManagerFactory;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationRequiredUserRoleType;

/**
 * Class UserFormAuthenticator
 * @package WilhelmSempre\UserBundle\Security
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class UserFormAuthenticator implements SimpleFormAuthenticatorInterface
{

    /**
     * @var UserPasswordEncoder
     */
    private $passwordEncoder;

    /**
     * @var TokenService
     */
    private $tokenService;

    /**
     * UserFormAuthenticator constructor.
     * @param TwoFactorUserRoleManagerFactory $factorUserRoleManagerFactory
     */
    public function __construct(UserPasswordEncoder $passwordEncoder, TokenService $tokenService)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->tokenService = $tokenService;
    }

    /**
     * {@inheritdoc}
     */
    public function createToken(Request $request, $username, $password, $providerKey)
    {
        return $this->tokenService
            ->createToken($username, $password, $providerKey)
        ;
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

        if (false === $this->passwordEncoder->isPasswordValid($user, $credentials)) {
            return false;
        }

        $user = $this->tokenService
            ->addRoleToToken($user)
        ;

        $userRoles = $user->getRoles();

        return $this->tokenService
            ->createToken($user, $credentials, $providerKey, $userRoles)
        ;
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