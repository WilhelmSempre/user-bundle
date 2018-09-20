<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

/**
 * Class AuthorizationMethodTypes
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthorizationMethodTypes
{

    /**
     * @var string
     */
    const MAIL = 'mail';

    /**
     * @var string
     */
    const GOOGLE_AUTHENTICATOR = 'google_authenticator';

    /**
     * @return array
     */
    public static function getChoices(): array
    {
        return [
            self::GOOGLE_AUTHENTICATOR => 'Google Authenticator',
            self::MAIL => 'Mail',
        ];
    }
}