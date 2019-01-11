<?php

namespace WilhelmSempre\UserBundle\Type;

/**
 * Class TwoFactorAuthorizationMethodType
 * @package WilhelmSempre\UserBundle\Type
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorizationMethodType
{

    /**
     * @var int
     */
    const GOOGLE_AUTHENTICATOR = 1;

    /**
     * @var int
     */
    const MAIL = 2;

	/**
	 * @var array
	 */
    private static $choices = [
	    self::GOOGLE_AUTHENTICATOR => 'Google Authenticator',
	    self::MAIL => 'Mail',
    ];

    /**
     * @return array
     */
    public static function getChoices(): array
    {
        return self::$choices;
    }
	
	/**
	 * @param $choice
	 * @return string
	 */
    public static function getChoice($choice): string
    {
        return self::$choices[$choice];
    }
}
