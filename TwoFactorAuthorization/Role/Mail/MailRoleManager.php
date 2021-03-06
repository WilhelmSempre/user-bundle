<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail;

use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleManagerInterface;

/**
 * Class MailRoleManager
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailRoleManager implements TwoFactorAuthorizationRoleManagerInterface
{

    /**
     * @var string
     */
    const AUTHORIZATION_ROLE = 'AUTHORIZATION_BY_MAIL_REQUIRED';

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
        $roles = $user->getRoles();

        foreach ($roles as $role) {
            if ($role !== self::AUTHORIZATION_ROLE) {
                $user->setRole($role);
            }
        }

        return $user->getRoles();
    }
}
