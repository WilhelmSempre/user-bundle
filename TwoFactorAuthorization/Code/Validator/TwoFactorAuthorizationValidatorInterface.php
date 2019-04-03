<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator;

use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\Services\UserService;

/**
 * Interface TwoFactorAuthorizationValidatorInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Validator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationValidatorInterface
{

    /**
     * @param string $twoFactorAuthorizationCode
     * @param UserInterface|null $user
     * @param UserService $userService
     * @return bool
     */
	public function isValid(string $twoFactorAuthorizationCode, ?UserInterface $user, UserService $userService): bool;
}
