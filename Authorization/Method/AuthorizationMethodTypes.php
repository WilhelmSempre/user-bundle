<?php


namespace WilhelmSempre\UserBundle\Authorization;

/**
 * Class AuthorizationMethodTypes
 * @package WilhelmSempre\UserBundle\Authorization
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class AuthorizationMethodTypes
{

    /**
     * @var string
     */
    const MAIL = 'mail';

    /**
     * @var string
     */
    const GOOGLE_AUTHENTICATOR = 'google_authenticator';
}