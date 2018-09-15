<?php

namespace WilhelmSempre\UserBundle\Authorization;

/**
 * Interface AuthorizationMethodInterface
 * @package WilhelmSempre\UserBundle\Authorization
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