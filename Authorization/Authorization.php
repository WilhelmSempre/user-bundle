<?php

namespace WilhelmSempre\UserBundle\Authorization;

use WilhelmSempre\UserBundle\Authorization\AuthorizationInterface;
use WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator\GoogleAuthenticatorFactory;
use WilhelmSempre\UserBundle\Authorization\Method\Mail\MailFactory;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodFactoryInterface;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodTypes;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Exceptions\NullAuthorizationMethodException;

/**
 * Class AuthorizationMethodFactory
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class Authorization implements AuthorizationInterface
{

    /**
     * {@inheritdoc}
     */
    public function createAuthorization(string $authorizationMethod): AuthorizationMethodInterface
    {

        switch ($authorizationMethod) {
            case AuthorizationMethodTypes::MAIL:
                $factory = new MailFactory();
                break;
            case AuthorizationMethodTypes::GOOGLE_AUTHENTICATOR:
                $factory = new GoogleAuthenticatorFactory();
                break;
            default:
                throw new NullAuthorizationMethodException();
        }

        return $factory->createAuthorizationMethod();
    }
}