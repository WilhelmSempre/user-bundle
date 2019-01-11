<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

use WilhelmSempre\UserBundle\Model\User;

/**
 * Interface TwoFactorAuthorizationRoleAssignerInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 */
interface TwoFactorAuthorizationRoleAssignerInterface
{

    /**
     * @param User $user
     * @return array
     */
    public function assignRoleToUser(User $user): array;
}