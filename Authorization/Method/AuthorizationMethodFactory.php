<?php

namespace WilhelmSempre\UserBundle\Authorization;

use WilhelmSempre\UserBundle\Authorization\Method\Mail;
use WilhelmSempre\UserBundle\Exceptions\InvalidAuthorizationMethodException;
use WilhelmSempre\UserBundle\Method\GoogleAuthenticator;

/**
 * Class AuthorizationMethodFactory
 * @package WilhelmSempre\UserBundle\Authorization
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthorizationMethodFactory extends AuthorizationMethodTypes
{

    /**
     * @param string $method
     * @return AuthorizationMethodInterface
     *
     * @throws InvalidAuthorizationMethodException
     */
    public function getAuthoricationMethod(string $method): AuthorizationMethodInterface
    {
        if ($method === AuthorizationMethodTypes::MAIL) {
            return new Mail();
        }

        if ($method === AuthorizationMethodTypes::GOOGLE_AUTHENTICATOR) {
            return new GoogleAuthenticator();
        }

        throw new InvalidAuthorizationMethodException();
    }
}