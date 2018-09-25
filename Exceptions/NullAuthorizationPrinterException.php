<?php
	
namespace WilhelmSempre\UserBundle\Exceptions;

/**
 * Class NullAuthorizationPrinterException
 * @package WilhelmSempre\UserBundle\Exceptions
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullAuthorizationPrinterException extends \Exception
{
	/**
	 * NullAuthorizationPrinterException constructor
	 */
	public function __construct()
	{
		parent::__construct('Specify authorization printer!');
	}
}