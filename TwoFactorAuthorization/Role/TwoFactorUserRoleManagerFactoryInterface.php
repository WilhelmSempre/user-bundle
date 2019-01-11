<?php


namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

/**
 * Interface TwoFactorAuthorizationUserRolesFactoryInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 */
interface TwoFactorUserRoleManagerFactoryInterface
{

    /**
     * @param int $twoFactorAuthorizationMethod
     * @return TwoFactorAuthorizationRoleAssignerInterface
     */
    public function getManager(int $twoFactorAuthorizationMethod): TwoFactorAuthorizationRoleAssignerInterface;
}
