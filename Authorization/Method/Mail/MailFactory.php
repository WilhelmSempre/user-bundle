<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\Mail;

use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Authorization\Method\Mail\Mail;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodFactoryInterface;

/**
 * Class MailFactory
 * @package WilhelmSempre\UserBundle\Authorization\Method\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailFactory implements AuthorizationMethodFactoryInterface
{

    /**
     * @inheritdoc
     */
    public function createAuthorizationMethod(): AuthorizationMethodInterface
    {
        return new Mail();
    }
}