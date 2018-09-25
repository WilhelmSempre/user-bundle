<?php

namespace WilhelmSempre\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package WilhelmSempre\UserBundle\Model
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class User implements UserInterface
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=255)
     */
    protected $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="authorization_method", type="string", length=255)
     */
    protected $authorizationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="authorization_code", type="string", length=255)
     */
    protected $authorizationCode;

    /**
     * @param int $id
     * @return UserInterface
     */
    public function setId(int $id): UserInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $username
     * @return UserInterface
     */
    public function setUsername(string $username): UserInterface
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $password
     * @return UserInterface
     */
    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param \DateTime $createdAt
     * @return UserInterface
     */
    public function setCreatedAt(\DateTime $createdAt): UserInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param string $uid
     * @return UserInterface
     */
    public function setUid(string $uid): UserInterface
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail(string $email): UserInterface
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode(): string
    {
        return $this->authorizationCode;
    }

    /**
     * @return string
     */
    public function getAuthorizationMethod(): string
    {
        return $this->authorizationMethod;
    }

    /**
     * @param string $authorizationMethod
     * @return UserInterface
     */
    public function setAuthorizationMethod(string $authorizationMethod): UserInterface
    {
        $this->authorizationMethod = $authorizationMethod;

        return $this;
    }

    public function test(): UserInterface
    {
        return $this;
    }

}