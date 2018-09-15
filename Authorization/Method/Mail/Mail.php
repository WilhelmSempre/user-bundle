<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

use WilhelmSempre\UserBundle\Authorization\AuthorizationMethodInterface;

/**
 * Class Mail
 * @package WilhelmSempre\UserBundle\Method
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

    }

    /**
     * @inheritdoc
     */
    public function getToken(): string
    {
        return $this->authorizationToken;
    }
}
