<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

use WilhelmSempre\UserBundle\Model\User;

/**
 * Interface TwoFactorAuthorizationRoleManagerInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 */
interface TwoFactorAuthorizationRoleManagerInterface
{

    /**
     * @param User $user
     * @return array
     */
    public function addUserRole(User $user): array;

    /**
     * @param User $user
     * @return array
     */
    public function removeUserRole(User $user): array;
}
