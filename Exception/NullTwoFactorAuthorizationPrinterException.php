<?php
	
namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullTwoFactorAuthorizationPrinterException
 * @package WilhelmSempre\UserBundle\Exception
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullTwoFactorAuthorizationPrinterException extends \Exception
{
	/**
	 * NullTwoFactorAuthorizationPrinterException constructor
	 */
	public function __construct()
	{
		parent::__construct('Specify TwoFactorAuthorization printer!');
	}
}