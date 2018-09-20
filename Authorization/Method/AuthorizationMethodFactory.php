<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

use WilhelmSempre\UserBundle\Authorization\Method\Mail\Mail;
use WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator\GoogleAuthenticator;

/**
 * Class AuthorizationMethodFactory
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthorizationMethodFactory
{

    /**
     * @param string $method
     * @return AuthorizationMethodInterface
     *
     * @throws InvalidAuthorizationMethodException
     */
    public function getAuthorizationMethod(string $method): AuthorizationMethodInterface
    {

        switch ($method) {
            case AuthorizationMethodTypes::MAIL:
                return new Mail();
                break;
            case AuthorizationMethodTypes::GOOGLE_AUTHENTICATOR:
                return new GoogleAuthenticator();
                break;
            default:
                throw new InvalidAuthorizationMethodException();
        }
    }
}