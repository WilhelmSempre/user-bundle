<?php

namespace WilhelmSempre\UserBundle\Services\Mailing;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Translation\TranslatorInterface;
use WilhelmSempre\UserBundle\Model\UserInterface;

/**
 * Class TwoFactorAuthorizationCodeMailer
 * @package WilhelmSempre\UserBundle\Services\Mailing
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorizationCodeMailer
{

    /**
     * @var \Swift_Mailer
     */
    private $swiftMailer;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var TwigEngine
     */
    private $twigEngine;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var string
     */
    private $senderAddress;

    /**
     * TwoFactorAuthorizationCodeMailer constructor.
     * @param \Swift_Mailer $swiftMailer
     */
    public function __construct(\Swift_Mailer $swiftMailer, TranslatorInterface $translator, TwigEngine $twigEngine, EventDispatcherInterface $eventDispatcher, string $senderAddress)
    {
        $this->swiftMailer = $swiftMailer;
        $this->translator = $translator;
        $this->twigEngine = $twigEngine;
        $this->eventDispatcher = $eventDispatcher;
        $this->senderAddress = $senderAddress;
    }

    /**
     * @param string $code
     * @param UserInterface $user
     */
    public function sendAuthorizationCode(string $code, UserInterface $user)
    {
        $message = new \Swift_Message($this->translator
            ->trans('mails.authorization.code.subject', [], 'mails'));

        $template = $this->twigEngine
            ->render('@User/mails/authorization-code.html.twig', [
                'code' => $code,
            ])
        ;

        $message
            ->setFormat('html')
            ->setContentType('text/html')
            ->setSender($this->senderAddress)
            ->setTo([
                $user->getEmail(),
            ])
            ->setBody($template)
        ;

        $result = $this->swiftMailer
            ->send($message)
        ;
    }
}