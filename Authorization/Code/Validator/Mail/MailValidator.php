<?php
	
namespace WilhelmSempre\UserBundle\Authorization\Code\Validator\Mail;

use WilhelmSempre\UserBundle\Authorization\Code\Validator\AuthorizationValidatorInterface;

/**
 * Class MailValidator
 * @package WilhelmSempre\UserBundle\Authorization\Code\Validator\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class MailValidator implements AuthorizationValidatorInterface
{
	
	/**
	 * {@inheritdoc}
	 */
	public function isValid(string $authorizationCode): bool
	{
		// TODO: Implement isValid() method.
	}
}