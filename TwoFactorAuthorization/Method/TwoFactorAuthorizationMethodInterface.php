<?php

namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Method;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\TwoFactorAuthorizationPrinterInterface;
use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Validator\TwoFactorAuthorizationValidatorInterface;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationPrinterException;
use WilhelmSempre\UserBundle\Exception\NullTwoFactorAuthorizationValidatorException;

/**
 * Interface TwoFactorAuthorizationMethodInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Method
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationMethodInterface
{

    /**
     * @return TwoFactorAuthorizationMethodInterface
     */
    public function process(): TwoFactorAuthorizationMethodInterface;
	
	/**
	 * @param TwoFactorAuthorizationValidatorInterface $twoFactorAuthorizationValidator
	 * @return TwoFactorAuthorizationMethodInterface
	 */
    public function setTwoFactorTwoFactorAuthorizationValidator(TwoFactorAuthorizationValidatorInterface $twoFactorAuthorizationValidator): TwoFactorAuthorizationMethodInterface;

    /**
     * @param TwoFactorAuthorizationPrinterInterface $twoFactorAuthorizationPrinter
     * @return TwoFactorAuthorizationMethodInterface
     */
	public function setTwoFactorTwoFactorAuthorizationPrinter(TwoFactorAuthorizationPrinterInterface $twoFactorAuthorizationPrinter): TwoFactorAuthorizationMethodInterface;
	
	/**
	 * @return TwoFactorAuthorizationValidatorInterface
	 *
	 * @throws NullTwoFactorAuthorizationValidatorException
	 */
	public function getTwoFactorTwoFactorAuthorizationValidator(): TwoFactorAuthorizationValidatorInterface;
	
	/**
	 * @return TwoFactorAuthorizationPrinterInterface
	 *
	 * @throws NullTwoFactorAuthorizationPrinterException
	 */
	public function getTwoFactorTwoFactorAuthorizationPrinter(): TwoFactorAuthorizationPrinterInterface;
}