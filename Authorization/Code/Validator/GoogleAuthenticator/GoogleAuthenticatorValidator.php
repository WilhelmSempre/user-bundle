<?php
	
namespace WilhelmSempre\UserBundle\Authorization\Code\Validator\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Authorization\Code\Validator\AuthorizationValidatorInterface;

/**
 * Class GoogleAuthenticatorValidator
 * @package WilhelmSempre\UserBundle\Authorization\Code\Validator\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorValidator implements AuthorizationValidatorInterface
{
	
	/**
	 * @inheritdoc
	 */
	public function isValid(string $authorizationCode): bool
	{
		// TODO: Implement isValid() method.
	}
}