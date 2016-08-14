<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $id;
    private $username;
    private $password;
    private $plainPassword;
    private $email;
    private $avatar;
    private $roles;

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

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

