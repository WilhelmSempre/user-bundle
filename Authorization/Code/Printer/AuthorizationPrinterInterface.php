<?php
	
namespace WilhelmSempre\UserBundle\Authorization\Code\Printer;

/**
 * Interface AuthorizationPrinterInterface
 * @package WilhelmSempre\UserBundle\Authorization\Code\AuthorizationPrinterInterface
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface AuthorizationPrinterInterface
{
	
	/**
	 * @return string
	 */
	public function getAuthorizationCode(): string;
	
	/**
	 * @param string $authorizationCode
	 * @return AuthorizationPrinterInterface
	 */
	public function setAuthorizationCode(string $authorizationCode): AuthorizationPrinterInterface;
}