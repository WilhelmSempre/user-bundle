<?php

namespace WilhelmSempre\UserBundle\Exceptions;

/**
 * Class Exception
 * @package WilhelmSempre\UserBundle\Exceptions
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class InvalidAuthorizationMethodException extends \Exception
{

    /**
     * Exception constructor
     */
    public function __construct()
    {
        parent::__construct('Specify authorization method!');
    }
}