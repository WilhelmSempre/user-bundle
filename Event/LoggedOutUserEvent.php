<?php

namespace WilhelmSempre\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use WilhelmSempre\UserBundle\Model\UserInterface;

/**
 * Class LoggedOutUserEvent
 * @package WilhelmSempre\UserBundle\Event
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class LoggedOutUserEvent extends Event
{

    /**
     * @var string
     */
    const EVENT_NAME = 'user.logged.out';

    /**
     * @var null|UserInterface
     */
    protected $authenticatedUser;

    /**
     * LoggedOutUserEvent constructor.
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
