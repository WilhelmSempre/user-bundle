<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\GoogleAuthenticator\GoogleAuthenticatorFactory;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail\MailFactory;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodTypes;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException;
use WilhelmSempre\UserBundle\Security\LoginFormAuthenticator;

/**
 * Class TwoFactorAuthorizationMethodFactory
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorization implements TwoFactorAuthorizationInterface
{

    /**
     * {@inheritdoc}
     */
    public function createTwoFactorAuthorization(string $twoFactorAuthorizationMethod): TwoFactorAuthorizationMethodInterface
    {

        switch ($twoFactorAuthorizationMethod) {
            case TwoFactorAuthorizationMethodTypes::MAIL:
                $factory = new MailFactory();
                break;
            case TwoFactorAuthorizationMethodTypes::GOOGLE_AUTHENTICATOR:
                $factory = new GoogleAuthenticatorFactory();
                break;
            default:
                throw new NullTwoFactorAuthorizationMethodException();
        }

        return $factory->createTwoFactorAuthorizationMethod();
    }
}