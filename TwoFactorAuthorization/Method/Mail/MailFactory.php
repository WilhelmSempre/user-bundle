<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail\Mail;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodFactoryInterface;

/**
 * Class MailFactory
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailFactory implements TwoFactorAuthorizationMethodFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function createTwoFactorAuthorizationMethod(): TwoFactorAuthorizationMethodInterface
    {
        return new Mail();
    }
}