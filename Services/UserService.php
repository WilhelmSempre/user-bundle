<?php

namespace WilhelmSempre\UserBundle\Services;

use Doctrine\ORM\EntityManagerInterface;
use WilhelmSempre\UserBundle\Model\UserInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\TwoFactorAuthorization;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\Mail\MailValidator;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\Plain\TwoFactorAuthorizationPlainPrinter;
use WilhelmSempre\UserBundle\Type\TwoFactorAuthorizationMethodType;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface;

/**
 * Class UserService
 * @package WilhelmSempre\UserBundle\Services
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class UserService
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param UserInterface $user
     * @param string $code
     * @return TwoFactorControllerListener
     */
    public function setUserToken(UserInterface $user, string $token): self
    {
        $user->setToken($token);

        $this->entityManager
            ->persist($user)
        ;

        $this->entityManager
            ->flush()
        ;

        return $this;
    }

    /**
     * @return \WilhelmSempre\UserBundle\TwoFactorAuthorization\Method\TwoFactorAuthorizationMethodInterface
     * @throws \WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationMethodException
     */
    public function createMailTwoFactorAuthorizationProvider(): TwoFactorAuthorizationMethodInterface
    {
        $mailTwoFactorAuthorization = new TwoFactorAuthorization();
        $mailTwoFactorAuthorizationFactory = $mailTwoFactorAuthorization
            ->createTwoFactorAuthorization(TwoFactorAuthorizationMethodType::MAIL)
        ;

        $mailTwoFactorAuthorizationProvider = $mailTwoFactorAuthorizationFactory
            ->setTwoFactorAuthorizationPrinter(new TwoFactorAuthorizationPlainPrinter())
            ->setTwoFactorAuthorizationValidator(new MailValidator())
            ->process()
        ;

        return $mailTwoFactorAuthorizationProvider;
    }

    /**
     * @param UserInterface $user
     * @return UserService
     */
    public function clearUserToken(UserInterface $user): self
    {
        return $this->setUserToken($user, null);
    }
}