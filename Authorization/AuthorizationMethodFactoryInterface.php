<?php

namespace WilhelmSempre\UserBundle\Authorization;

/**
 * Interface AuthorizationMethodFactoryInterface
 * @package WilhelmSempre\UserBundle\Authorization
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationMethodFactoryInterface
{

    /**
     * @param string $method
     * @return AuthorizationMethodInterface
     */
    public function getAuthorizationMethod(string $method): AuthorizationMethodInterface;
}