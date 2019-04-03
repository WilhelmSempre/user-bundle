<?php

namespace WilhelmSempre\UserBundle\EventDispatcher;

/**
 * Class TwoFactorMailEvents
 * @package WilhelmSempre\UserBundle\EventDispatcher
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorMailEvents
{

    /**
     * @var string
     */
    const PRE_MAIL_SENDING_NAME = 'pre.mail.sending.name';

    /**
     * @var string
     */
    const POST_MAIL_SENDING_NAME = 'post.mail.sending.name';

    /**
     * @var string
     */
    const MAIL_SENDING_SUCCESS = 'mail.sending.success';

    /**
     * @var string
     */
    const MAIL_SENDING_FAILURE = 'mail.sending.failure';
}