<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator\GoogleAuthenticatorRoleManager;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail\MailRoleManager;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException;

/**
 * Class TwoFactorAuthorizationUserRolesFactory
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorUserRoleManagerFactory implements TwoFactorUserRoleManagerFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function getManager(int $twoFactorAuthorizationMethod): TwoFactorAuthorizationRoleManagerInterface
    {
        switch ($twoFactorAuthorizationMethod) {
            case TwoFactorAuthorizationMethodType::MAIL:
                $manager = new MailRoleManager();
                break;
            case TwoFactorAuthorizationMethodType::GOOGLE_AUTHENTICATOR:
                $manager = new GoogleAuthenticatorRoleManager();
                break;
            default:
                throw new NullTwoFactorAuthorizationMethodException();
        }

        return $manager;
    }
}
