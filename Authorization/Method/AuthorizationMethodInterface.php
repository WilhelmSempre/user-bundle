<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

use WilhelmSempre\UserBundle\Authorization\Code\Printer\AuthorizationPrinterInterface;
use WilhelmSempre\UserBundle\Authorization\Code\Validator\AuthorizationValidatorInterface;

/**
 * Interface AuthorizationMethodInterface
 * @package WilhelmSempre\UserBundle\Authorization\Method
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationMethodInterface
{

    /**
     * @return AuthorizationMethodInterface
     */
    public function process(): AuthorizationMethodInterface;
	
	/**
	 * @param AuthorizationValidatorInterface $authorizationValidator
	 * @return AuthorizationMethodInterface
	 */
    public function setAuthorizationValidator(AuthorizationValidatorInterface $authorizationValidator): AuthorizationMethodInterface;
	
	/**
	 * @param AuthorizationPrinterInterface $printer
	 * @return AuthorizationMethodInterface
	 */
	public function setAuthorizationPrinter(AuthorizationPrinterInterface $authorizationPrinter): AuthorizationMethodInterface;
	
	/**
	 * @return AuthorizationValidatorInterface
	 *
	 * @throws NullAuthorizationValidatorException
	 */
	public function getAuthorizationValidator(): AuthorizationValidatorInterface;
	
	/**
	 * @return AuthorizationPrinterInterface
	 *
	 * @throws NullAuthorizationPrinterException
	 */
	public function getAuthorizationPrinter(): AuthorizationPrinterInterface;
}