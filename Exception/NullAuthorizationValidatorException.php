<?php
	
namespace WilhelmSempre\UserBundle\Exception;

/**
 * Class NullAuthorizationValidatorException
 * @package WilhelmSempre\UserBundle\Exception
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class NullAuthorizationValidatorException extends \Exception
{
	/**
	 * NullAuthorizationValidatorException constructor
	 */
	public function __construct()
	{
		parent::__construct('Specify authorization validator!');
	}
}