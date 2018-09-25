<?php

namespace WilhelmSempre\UserBundle\Authorization\Code\Encoder;


/**
 * Class AuthorizationCodeEncoder
 * @package WilhelmSempre\UserBundle\Authorization\Code\Encoder
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthorizationCodeEncoder
{
	
	/**
	 * @return string
	 * @throws \Exception
	 */
    public function createAuthorizationCode()
    {
	    $authorizationCode = bin2hex(random_bytes(6));
		return $authorizationCode;
    }
}