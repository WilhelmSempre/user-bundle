<?php

namespace WilhelmSempre\UserBundle\Authorization\Code\Validator;

/**
 * Interface AuthorizationValidatorInterface
 * @package WilhelmSempre\UserBundle\Authorization\Validator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationValidatorInterface
{
	
	/**
	 * @param string $authorizationCode
	 * @return bool
	 */
	public function isValid(string $authorizationCode): bool;
}