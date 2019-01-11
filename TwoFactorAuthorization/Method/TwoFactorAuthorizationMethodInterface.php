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
    public function setTwoFactorAuthorizationValidator(TwoFactorAuthorizationValidatorInterface $twoFactorAuthorizationValidator): TwoFactorAuthorizationMethodInterface;

    /**
     * @param TwoFactorAuthorizationPrinterInterface $twoFactorAuthorizationPrinter
     * @return TwoFactorAuthorizationMethodInterface
     */
	public function setTwoFactorAuthorizationPrinter(TwoFactorAuthorizationPrinterInterface $twoFactorAuthorizationPrinter): TwoFactorAuthorizationMethodInterface;
	
	/**
	 * @return TwoFactorAuthorizationValidatorInterface
	 *
	 * @throws NullTwoFactorAuthorizationValidatorException
	 */
	public function getTwoFactorAuthorizationValidator(): TwoFactorAuthorizationValidatorInterface;
	
	/**
	 * @return TwoFactorAuthorizationPrinterInterface
	 *
	 * @throws NullTwoFactorAuthorizationPrinterException
	 */
	public function getTwoFactorAuthorizationPrinter(): TwoFactorAuthorizationPrinterInterface;
}
