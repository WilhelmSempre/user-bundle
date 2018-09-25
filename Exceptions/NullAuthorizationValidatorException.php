<?php
	
namespace WilhelmSempre\UserBundle\Exceptions;

/**
 * Class NullAuthorizationValidatorException
 * @package WilhelmSempre\UserBundle\Exceptions
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