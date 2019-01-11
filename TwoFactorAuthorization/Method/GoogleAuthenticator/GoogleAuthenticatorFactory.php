<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\GoogleAuthenticator;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodFactoryInterface;

/**
 * Class GoogleAuthenticatorFactory
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorFactory implements TwoFactorAuthorizationMethodFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function createTwoFactorAuthorizationMethod(): TwoFactorAuthorizationMethodInterface
    {
        return new GoogleAuthenticator();
    }
}
