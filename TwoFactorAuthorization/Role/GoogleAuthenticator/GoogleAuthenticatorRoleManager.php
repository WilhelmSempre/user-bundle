<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleManagerInterface;

/**
 * Class GoogleAuthenticatorRoleManager
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorRoleManager implements TwoFactorAuthorizationRoleManagerInterface
{

    /**
     * @var string
     */
    const AUTHORIZATION_ROLE = 'AUTHORIZATION_BY_GOOGLE_REQUIRED';

    /**
     * {@inheritdoc}
     */
    public function addUserRole(User $user): array
    {
        $user->setRole(self::AUTHORIZATION_ROLE);

        return $user->getRoles();
    }

    /**
     * {@inheritdoc}
     */
    public function removeUserRole(User $user): array
    {

    }
}
