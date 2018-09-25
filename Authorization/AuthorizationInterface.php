<?php

namespace WilhelmSempre\UserBundle\Authorization;

use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodFactoryInterface;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;

/**
 * Interface AuthorizationInterface
 * @package WilhelmSempre\UserBundle\Authorization
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationInterface
{

    /**
     * @param string $authorizationMethod
     * @return AuthorizationMethodInterface
     *
     * @throws InvalidAuthorizationMethodException
     */
    public function createAuthorization(string $authorizationMethod): AuthorizationMethodInterface;
}