<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Role;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\GoogleAuthenticator\GoogleAuthenticatorRoleAssigner;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Role\Mail\MailRoleAssigner;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException;

/**
 * Class TwoFactorAuthorizationUserRolesFactory
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Role
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorizationUserRolesFactory implements TwoFactorAuthorizationUserRolesFactoryInterface
{


    /**
     * {@inheritdoc}
     */
    public function createRoleAssigner(int $twoFactorAuthorizationMethod): TwoFactorAuthorizationRoleAssignerInterface
    {
        switch ($twoFactorAuthorizationMethod) {
            case TwoFactorAuthorizationMethodType::MAIL:
                $factory = new MailRoleAssigner();
                break;
            case TwoFactorAuthorizationMethodType::GOOGLE_AUTHENTICATOR:
                $factory = new GoogleAuthenticatorRoleAssigner();
                break;
            default:
                throw new NullTwoFactorAuthorizationMethodException();
        }

        return $factory;
    }
}