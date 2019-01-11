<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail;

use WilhelmSempre\UserBundle\Model\User;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\TwoFactorAuthorizationRoleAssignerInterface;

/**
 * Class MailRoleAssigner
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailRoleAssigner implements TwoFactorAuthorizationRoleAssignerInterface
{

    /**
     * {@inheritdoc}
     */
    public function assignRoleToUser(User $user): array
    {
        $user->setRole('AUTHORIZATION_BY_MAIL_REQUIRED');

        return $user->getRoles();
    }
}