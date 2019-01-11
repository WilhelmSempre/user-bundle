<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException;

/**
 * Interface TwoFactorAuthorizationInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationInterface
{

    /**
     * @param string $twoFactorAuthorizationMethod
     * @return TwoFactorAuthorizationMethodInterface
     *
     * @throws NullTwoFactorAuthorizationMethodException
     */
    public function createTwoFactorAuthorization(string $twoFactorAuthorizationMethod): TwoFactorAuthorizationMethodInterface;
}
