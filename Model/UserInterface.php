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
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param string $uid
     * @return UserInterface
     */
    public function setUid(string $uid): self;

    /**
     * @return string
     */
    public function getUid(): string;

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail(string $email): self;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getAuthorizationCode(): string;

    /**
     * @return string
     */
    public function getAuthorizationMethod(): string;

    /**
     * @param string $authorizationMethod
     * @return UserInterface
     */
    public function setAuthorizationMethod(string $authorizationMethod): self;
}
