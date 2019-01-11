<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Method;

/**
 * Interface TwoFactorAuthorizationMethodFactoryInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationMethodFactoryInterface
{

    /**
     * @return TwoFactorAuthorizationMethodInterface
     */
    public function createTwoFactorAuthorizationMethod(): TwoFactorAuthorizationMethodInterface;
}
