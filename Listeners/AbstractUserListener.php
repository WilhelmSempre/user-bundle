<?php

namespace WilhelmSempre\UserBundle\Listeners;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;

/**
 * Class AbstractUserListener
 * @package WilhelmSempre\UserBundle\Listeners
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class AbstractUserListener
{

    /**
     * @param InteractiveLoginEvent $event
     */
    abstract function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void;

    /**
     * @param AuthenticationEvent $event
     */
    abstract function onSecurityAuthenticationSuccess(AuthenticationEvent $event): void;

    /**
     * @param AuthenticationFailureEvent $event
     */
    abstract function onSecurityAuthenticationFailure(AuthenticationFailureEvent $event): void;
}