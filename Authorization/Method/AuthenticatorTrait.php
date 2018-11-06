<?php

namespace WilhelmSempre\UserBundle\Authorization\Method;

use WilhelmSempre\UserBundle\Authorization\Code\Encoder\AuthorizationCodeEncoder;
use WilhelmSempre\UserBundle\Authorization\Code\Printer\AuthorizationPrinterInterface;
use WilhelmSempre\UserBundle\Authorization\Code\Validator\AuthorizationValidatorInterface;
use WilhelmSempre\UserBundle\Exceptions\NullAuthorizationPrinterException;
use WilhelmSempre\UserBundle\Exceptions\NullAuthorizationValidatorException;

/**
 * Trait AuthenticatorTrait
 * @package WilhelmSempre\UserBundle\Authorization\Method
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
trait AuthenticatorTrait
{
	/**
	 * @var string
	 */
	private $authorizationCode;
	
	/**
	 * @var AuthorizationValidatorInterface
	 */
	private $authorizationValidator;
	
	/**
	 * @var AuthorizationPrinterInterface
	 */
	private $authorizationPrinter;
	
	/**
	 * {@inheritdoc}
	 */
	public function process(): AuthorizationMethodInterface
	{
		$authorizationCodeEncoder = new AuthorizationCodeEncoder();
		
		$this->authorizationCode = $authorizationCodeEncoder->createAuthorizationCode();
		
		$this->getAuthorizationPrinter()
			->setAuthorizationCode($this->authorizationCode);
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setAuthorizationPrinter(AuthorizationPrinterInterface $authorizationPrinter): AuthorizationMethodInterface
	{
		$this->authorizationPrinter = $authorizationPrinter;
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setAuthorizationValidator(AuthorizationValidatorInterface $authorizationValidator): AuthorizationMethodInterface
	{
		$this->authorizationValidator = $authorizationValidator;
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getAuthorizationPrinter(): AuthorizationPrinterInterface
	{
		if (null === $this->authorizationPrinter) {
			throw new NullAuthorizationPrinterException();
		}
		
		return $this->authorizationPrinter;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getAuthorizationValidator(): AuthorizationValidatorInterface
	{
		if (null === $this->authorizationValidator) {
			throw new NullAuthorizationValidatorException();
		}
		
		return $this->authorizationValidator;
	}
}