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
     * @var int
     */
    const MAIL = 0;

    /**
     * @var int
     */
    const GOOGLE_AUTHENTICATOR = 1;
	
	/**
	 * @var array
	 */
    private $choices = [
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