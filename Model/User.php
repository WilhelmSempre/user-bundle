<?php

namespace WilhelmSempre\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

/**
 * Class User
 * @package WilhelmSempre\UserBundle\Model
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class User implements UserInterface, \Serializable, SecurityUserInterface
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
     * @var array
     *
     * @ORM\Column(name="roles", type="simple_array")
     */
    protected $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var int
     *
     * @ORM\Column(name="authorization_method", type="integer", length=1)
     */
    protected $authorizationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="authorization_secret_code", type="string", length=255)
     */
    protected $authorizationSecretCode;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    protected $token;

    /**
     * {@inheritdoc}
     */
    public function setId(int $id): UserInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function setUsername(string $username): UserInterface
    {
        $this->username = $username;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt): UserInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setUid(string $uid): UserInterface
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail(string $email): UserInterface
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
	public function setAuthorizationSecretCode(string $secretCode): UserInterface
	{
		$this->authorizationSecretCode = $secretCode;
		
		return $this;
	}

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationSecretCode(): ?string
    {
        return $this->authorizationSecretCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationMethod(): ?int
    {
        return $this->authorizationMethod;
    }

    /**
     * {@inheritdoc}
     */
    public function setAuthorizationMethod(int $authorizationMethod): UserInterface
    {
        $this->authorizationMethod = $authorizationMethod;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
	    return serialize([
		    $this->id,
		    $this->username,
		    $this->password,
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
	    list (
		    $this->id,
		    $this->username,
		    $this->password
	    ) = unserialize($serialized, [
	        'allowed_classes' => false,
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
	   
    }

    /**
     * {@inheritdoc}
     */
    public function setRole(string $role): UserInterface
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles(): array
    {
	    return array_unique($this->roles);
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
	    return null;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken(?string $token = null): UserInterface
    {
        $this->token = $token;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
}