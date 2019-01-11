<?php

namespace WilhelmSempre\UserBundle\Model;

/**
 * Interface UserInterface
 * @package WilhelmSempre\UserBundle\Model
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
interface UserInterface
{

    /**
     * @param int $id
     * @return UserInterface
     */
    public function setId(int $id): self;

    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return null|string
     */
    public function getUsername(): ?string;

    /**
     * @return null|string
     */
    public function getPassword(): ?string;

    /**
     * @param string $username
     * @return UserInterface
     */
    public function setUsername(string $username): self;

    /**
     * @param string $password
     * @return UserInterface
     */
    public function setPassword(string $password): self;

    /**
     * @param \DateTime $date
     * @return UserInterface
     */
    public function setCreatedAt(\DateTime $date): self;

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime;

    /**
     * @param string $uid
     * @return UserInterface
     */
    public function setUid(string $uid): self;

    /**
     * @return null|string
     */
    public function getUid(): ?string;

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail(string $email): self;

    /**
     * @return UserInterface
     */
    public function getRoles(): array;

    /**
     * @param string $role
     * @return UserInterface
     */
    public function setRole(string $role): UserInterface;

    /**
     * @return null|string
     */
    public function getEmail(): ?string;

    /**
     * @return int|null
     */
    public function getTwoFactorAuthorizationMethod(): ?int;

    /**
     * @param string $twoFactorAuthorizationMethod
     * @return UserInterface
     */
    public function setTwoFactorAuthorizationMethod(int $twoFactorAuthorizationMethod): self;

    /**
     * @return bool
     */
    public function isTwoFactorAuthorizationEnabled(): bool;

    /**
     * @param bool $twoFactorAuthorizationEnabled
     * @return UserInterface
     */
    public function setTwoFactorAuthorizationEnabled(bool $twoFactorAuthorizationEnabled): self;

    /**
     * @param null $token
     * @return UserInterface
     */
	public function setToken(?string $token = null): self;

    /**
     * @return null|string
     */
	public function getToken(): ?string;
}
