<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\Mail;

use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;

/**
 * Class Mail
 * @package WilhelmSempre\UserBundle\Authorization\Method\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class Mail implements AuthorizationMethodInterface
{

    /**
     * @var string
     */
    public $authorizationToken;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->process();
    }

    /**
     * @inheritdoc
     */
    public function process()
    {
        $this->authorizationToken = 'test';
    }

    /**
     * @inheritdoc
     */
    public function getToken(): string
    {
        return $this->authorizationToken;
    }
}
