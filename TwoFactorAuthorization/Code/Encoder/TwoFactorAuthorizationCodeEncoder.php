<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Encoder;


/**
 * Class TwoFactorAuthorizationCodeEncoder
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Encoder
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorizationCodeEncoder
{
	
	/**
	 * @return string
	 * @throws \Exception
	 */
    public function createTwoFactorAuthorizationCode()
    {
	    $twoFactorAuthorizationCode = bin2hex(random_bytes(6));
		return $twoFactorAuthorizationCode;
    }
}