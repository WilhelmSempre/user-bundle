<?php

namespace WilhelmSempre\UserBundle\Authorization\Method\Mail;

use WilhelmSempre\UserBundle\Authorization\Method\AuthenticatorTrait;
use WilhelmSempre\UserBundle\Authorization\Method\AuthorizationMethodInterface;

/**
 * Class Mail
 * @package WilhelmSempre\UserBundle\Authorization\Method\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class Mail implements AuthorizationMethodInterface
{
	use AuthenticatorTrait;
}
