<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\Mail;

use WilhelmSempre\UserBundle\Authorization\Code\Encoder\AuthorizationCodeEncoder;
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
    private $authorizationCode;

    /**
     * @inheritdoc
     */
    public function process(): void
    {
        $authorizationCodeEncoder = new AuthorizationCodeEncoder();
        
        $this->authorizationCode = $authorizationCodeEncoder->createAuthorizationCode();
    }

    /**
     * @inheritdoc
     */
    public function getAuthorizationCode(): string
    {
        return $this->authorizationCode;
    }
}
