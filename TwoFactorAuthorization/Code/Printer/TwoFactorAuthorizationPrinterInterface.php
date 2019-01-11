<?php
	
namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer;

/**
 * Interface TwoFactorAuthorizationPrinterInterface
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\TwoFactorAuthorizationPrinterInterface
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface TwoFactorAuthorizationPrinterInterface
{
	
	/**
	 * @return string
	 */
	public function getTwoFactorAuthorizationCode(): string;
	
	/**
	 * @param string $twoFactorAuthorizationCode
	 * @return TwoFactorAuthorizationPrinterInterface
	 */
	public function setTwoFactorAuthorizationCode(string $twoFactorAuthorizationCode): TwoFactorAuthorizationPrinterInterface;
}
