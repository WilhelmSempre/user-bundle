<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleAssignerInterface;

/**
 * Class GoogleAuthenticatorRoleAssigner
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorRoleAssigner implements TwoFactorAuthorizationRoleAssignerInterface
{

    /**
     * {@inheritdoc}
     */
    public function assignRoleToUser(User $user): array
    {
        $user->setRole('AUTHORIZATION_BY_GOOGLE_REQUIRED');

        return $user->getRoles();
    }
}