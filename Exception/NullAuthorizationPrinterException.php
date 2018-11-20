<?php
	
namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullAuthorizationPrinterException
 * @package WilhelmSempre\UserBundle\Exception
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