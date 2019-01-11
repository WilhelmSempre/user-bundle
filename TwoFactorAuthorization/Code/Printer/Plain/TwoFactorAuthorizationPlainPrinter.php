<?php
	
namespace WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\Plain;

use WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\TwoFactorAuthorizationPrinterInterface;

/**
 * Class TwoFactorAuthorizationPlainPrinter\Plain
 * @package WilhelmSempre\UserBundle\TwoFactorAuthorization\Code\Printer\Plain
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorAuthorizationPlainPrinter implements TwoFactorAuthorizationPrinterInterface
{
	
	/**
	 * @var string
	 */
	private $twoFactorAuthorizationCode;

	/**
	 * {@inheritdoc}
	 */
	public function getTwoFactorTwoFactorAuthorizationCode(): string
	{
		return $this->twoFactorAuthorizationCode;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setTwoFactorTwoFactorAuthorizationCode(string $twoFactorAuthorizationCode): TwoFactorAuthorizationPrinterInterface
	{
		$this->twoFactorAuthorizationCode = $twoFactorAuthorizationCode;
		
		return $this;
	}
}