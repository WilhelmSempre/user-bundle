<?php

namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullTwoFactorAuthorizationMethodException
 * @package WilhelmSempre\UserBundle\Exception
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullTwoFactorAuthorizationMethodException extends \Exception
{

    /**
     * NullTwoFactorAuthorizationMethodException constructor
     */
    public function __construct()
    {
        parent::__construct('Specify TwoFactorAuthorization method!');
    }
}
