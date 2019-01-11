<?php
	
namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\Mail;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\TwoFactorAuthorizationValidatorInterface;

/**
 * Class MailValidator
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailValidator implements TwoFactorAuthorizationValidatorInterface
{
	
	/**
	 * {@inheritdoc}
	 */
	public function isValid(string $twoFactorAuthorizationCode): bool
	{
		// TODO: Implement isValid() method.
	}
}
