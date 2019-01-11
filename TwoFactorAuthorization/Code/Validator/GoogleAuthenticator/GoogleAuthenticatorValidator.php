<?php
	
namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\GoogleAuthenticator;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\TwoFactorAuthorizationValidatorInterface;

/**
 * Class GoogleAuthenticatorValidator
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticatorValidator implements TwoFactorAuthorizationValidatorInterface
{
	
	/**
	 * {@inheritdoc}
	 */
	public function isValid(string $twoFactorAuthorizationCode): bool
	{
		// TODO: Implement isValid() method.
	}
}