<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $avatar;

    /**
     * @var string
     */
    private $roles;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get suername
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plain password
     *
     * @param string $plainPassword
     *
     * @return $this
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plain password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param integer $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return integer
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return (array)$this->roles;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Get multipler from User role for calculate score
     *
     * @return float $multipler
     */
    public function getMultipler()
    {
        $roles = $this->getRoles();

        switch (end($roles))
        {
            case 'ROLE_BOSS': $multipler = 1.7; break;
            case 'ROLE_VICEBOSS': $multipler = 1.7; break;
            case 'ROLE_DISPATCHER': $multipler = 1.3; break;
            case 'ROLE_DRIVER': $multipler = 1.3; break;
            case 'ROLE_DEMO': $multipler = 0.8; break;
        }

        return $multipler;
    }

    /**
     * Transform role for valid format
     *
     * @param string $roles
     *
     * @return string $roles
     */
    public function transformRoles($roles)
    {
        switch (end($roles))
        {
            case 'boss': $roles = 'ROLE_BOSS'; break;
            case 'vice boss': $roles = 'ROLE_VICEBOSS'; break;
            case 'dispatcher': $roles = 'ROLE_DISPATCHER'; break;
            case 'driver': $roles = 'ROLE_DRIVER'; break;
            case 'demo': $roles = 'ROLE_DEMO'; break;
            case 'szef': $roles = 'ROLE_BOSS'; break;
            case 'vice szef': $roles = 'ROLE_VICEBOSS'; break;
            case 'dyspozytor': $roles = 'ROLE_DISPATCHER'; break;
            case 'kierowca': $roles = 'ROLE_DRIVER'; break;
            case 'okres testowy': $roles = 'ROLE_DEMO'; break;
        }

        return $roles;
    }
}

