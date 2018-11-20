<?php

namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullAuthorizationMethodException
 * @package WilhelmSempre\UserBundle\Exception
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