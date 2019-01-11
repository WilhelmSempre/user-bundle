<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator;

/**
 * Interface TwoFactorAuthorizationValidatorInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Validator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationValidatorInterface
{
	
	/**
	 * @param string $twoFactorAuthorizationCode
	 * @return bool
	 */
	public function isValid(string $twoFactorAuthorizationCode): bool;
}
