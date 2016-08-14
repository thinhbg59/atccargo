<?php

namespace AppBundle\Entity;

class Invitation
{
    protected $id;
    protected $email;
    protected $code;
    protected $roles;

    public function getId()
    {
        return $this->id;
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

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setRoles($roles)
    {
        switch ($roles)
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

        $this->roles = $roles;

        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}

