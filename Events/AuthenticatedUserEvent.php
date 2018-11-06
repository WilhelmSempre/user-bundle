<?php

namespace WilhelmSempre\UserBundle\Events;

use Symfony\Component\EventDispatcher\Event;
use WilhelmSempre\UserBundle\Model\UserInterface;

/**
 * Class UserAuthenticatedEvent
 * @package WilhelmSempre\UserBundle\Events
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthenticatedUserEvent extends Event
{

    /**
     * @var string
     */
    const EVENT_NAME = 'user.authenticated';

    /**
     * @var null|UserInterface
     */
    protected $authenticatedUser;

    /**
     * AuthenticatedUserEvent constructor.
     * @param null|UserInterface $authenticatedUser
     */
    public function __construct(?UserInterface $authenticatedUser = null)
    {
        $this->authenticatedUser = $authenticatedUser;
    }

    /**
     * @return null|UserInterface
     */
    public function getAuthenticatedUser(): ?UserInterface
    {
        return $this->authenticatedUser;
    }
}
