<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

/**
 * Interface AuthorizationMethodFactoryInterface
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationMethodFactoryInterface
{

    /**
     * @param string $method
     * @return AuthorizationMethodInterface
     */
    public function createAuthorizationMethod(): AuthorizationMethodInterface;
}