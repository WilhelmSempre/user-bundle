<?php
	
namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullTwoFactorAuthorizationValidatorException
 * @package WilhelmSempre\UserBundle\Exception
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullTwoFactorAuthorizationValidatorException extends \Exception
{
	/**
	 * NullTwoFactorAuthorizationValidatorException constructor
	 */
	public function __construct()
	{
		parent::__construct('Specify TwoFactorAuthorization validator!');
	}
}
