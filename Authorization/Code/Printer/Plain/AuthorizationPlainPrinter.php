<?php
	
namespace WilhelmSempre\UserBundle\Authorization\Code\Printer\Plain;

use WilhelmSempre\UserBundle\Authorization\Code\Printer\AuthorizationPrinterInterface;

/**
 * Class AuthorizationPlainPrinter\Plain
 * @package WilhelmSempre\UserBundle\Authorization\Code\Printer\Plain
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class AuthorizationPlainPrinter implements AuthorizationPrinterInterface
{
	
	/**
	 * @var string
	 */
	private $authorizationCode;
	
	/**
	 * @inheritdoc
	 */
	public function getAuthorizationCode(): string
	{
		return $this->authorizationCode;
	}
	
	/**
	 * @inheritdoc
	 */
	public function setAuthorizationCode(string $authorizationCode): AuthorizationPrinterInterface
	{
		$this->authorizationCode = $authorizationCode;
		
		return $this;
	}
}