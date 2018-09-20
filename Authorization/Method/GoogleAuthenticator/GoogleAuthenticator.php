<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;

/**
 * Class GoogleAuthenticator
 * @package WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator
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
