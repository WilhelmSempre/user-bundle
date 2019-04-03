<?php
	
namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\Mail;

use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\Services\UserService;
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
	public function isValid(string $twoFactorAuthorizationCode, ?UserInterface $user, UserService $userService): bool
	{
		if (!$user) {
		    return false;
        }

		$token = $user->getToken();

		$isTokensIdentical = $token === $twoFactorAuthorizationCode;

		if (!$isTokensIdentical) {
		    return false;
        }

		//$userService->clearUserToken($user);

		return true;
	}
}
