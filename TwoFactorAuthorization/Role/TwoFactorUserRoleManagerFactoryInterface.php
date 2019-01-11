<?php


namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

/**
 * Interface TwoFactorAuthorizationUserRolesFactoryInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 */
interface TwoFactorAuthorizationUserRolesFactoryInterface
{

    /**
     * @param int $twoFactorAuthorizationMethod
     * @return TwoFactorAuthorizationRoleAssignerInterface
     */
    public function createRoleAssigner(int $twoFactorAuthorizationMethod): TwoFactorAuthorizationRoleAssignerInterface;
}