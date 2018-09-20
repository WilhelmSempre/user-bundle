<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

/**
 * Interface AuthorizationMethodInterface
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationMethodInterface
{

    /**
     * AuthorizationMethodInterface constructor.
     */
    public function __construct();

    /**
     * @return void
     */
    public function process(): void;

    /**
     * @return string
     */
    public function getToken(): string;
}