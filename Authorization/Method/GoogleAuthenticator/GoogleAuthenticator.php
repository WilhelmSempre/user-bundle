<?php

namespace WilhelmSempre\UserBundle\Method;

use WilhelmSempre\UserBundle\Authorization\AuthorizationMethodInterface;

/**
 * Class GoogleAuthenticator
 * @package WilhelmSempre\UserBundle\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticator implements AuthorizationMethodInterface
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
    public function process(): void
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
