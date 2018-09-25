<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator;

use WilhelmSempre\UserBundle\Authorization\Method\AuthenticatorTrait;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;

/**
 * Class GoogleAuthenticator
 * @package WilhelmSempre\UserBundle\Authorization\Method\GoogleAuthenticator
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class GoogleAuthenticator implements AuthorizationMethodInterface
{
	use AuthenticatorTrait;
}
