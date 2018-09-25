<?php

namespace WilhelmSempre\UserBundle\Exceptions;

/**
 * Class NullAuthorizationMethodException
 * @package WilhelmSempre\UserBundle\Exceptions
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullAuthorizationMethodException extends \Exception
{

    /**
     * NullAuthorizationMethodException constructor
     */
    public function __construct()
    {
        parent::__construct('Specify authorization method!');
    }
}