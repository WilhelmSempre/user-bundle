<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Authorization\Code\Encoder\AuthorizationCodeEncoder;
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
        return $this->authorizationToken;
    }
}
