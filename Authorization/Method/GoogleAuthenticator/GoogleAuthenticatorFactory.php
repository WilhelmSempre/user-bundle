<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodFactoryInterface;

/**
 * Class GoogleAuthenticatorFactory
 * @package WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorFactory implements AuthorizationMethodFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function createAuthorizationMethod(): AuthorizationMethodInterface
    {
        return new GoogleAuthenticator();
    }
}