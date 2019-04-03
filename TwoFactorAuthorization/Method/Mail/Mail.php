<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Encoder\TwoFactorAuthorizationCodeEncoder;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\TwoFactorAuthorizationPrinterInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\TwoFactorAuthorizationValidatorInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationPrinterException;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationValidatorException;

/**
 * Class Mail
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\Mail
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class Mail implements TwoFactorAuthorizationMethodInterface
{

    /**
     * @var string
     */
    private $twoFactorAuthorizationCode;

    /**
     * @var TwoFactorAuthorizationValidatorInterface
     */
    private $twoFactorAuthorizationValidator;

    /**
     * @var TwoFactorAuthorizationPrinterInterface
     */
    private $twoFactorAuthorizationPrinter;

    /**
     * {@inheritdoc}
     */
    public function process(): TwoFactorAuthorizationMethodInterface
    {
        $twoFactorAuthorizationCodeEncoder = new TwoFactorAuthorizationCodeEncoder();

        try {
            $this->twoFactorAuthorizationCode = $twoFactorAuthorizationCodeEncoder->createTwoFactorAuthorizationCode();

            $this->getTwoFactorAuthorizationPrinter()
                ->setTwoFactorAuthorizationCode($this->twoFactorAuthorizationCode)
            ;
        } catch (\Exception $error) {}

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTwoFactorAuthorizationPrinter(TwoFactorAuthorizationPrinterInterface $twoFactorAuthorizationPrinter): TwoFactorAuthorizationMethodInterface
    {
        $this->twoFactorAuthorizationPrinter = $twoFactorAuthorizationPrinter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTwoFactorAuthorizationValidator(TwoFactorAuthorizationValidatorInterface $twoFactorAuthorizationValidator): TwoFactorAuthorizationMethodInterface
    {
        $this->twoFactorAuthorizationValidator = $twoFactorAuthorizationValidator;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTwoFactorAuthorizationPrinter(): TwoFactorAuthorizationPrinterInterface
    {
        if (null === $this->twoFactorAuthorizationPrinter) {
            throw new NullTwoFactorAuthorizationPrinterException();
        }

        return $this->twoFactorAuthorizationPrinter;
    }

    /**
     * {@inheritdoc}
     */
    public function getTwoFactorAuthorizationValidator(): TwoFactorAuthorizationValidatorInterface
    {
        if (null === $this->twoFactorAuthorizationValidator) {
            throw new NullTwoFactorAuthorizationValidatorException();
        }

        return $this->twoFactorAuthorizationValidator;
    }
}
