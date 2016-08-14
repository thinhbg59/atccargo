<?php

namespace AppBundle\Entity;

class ChangePassword
{
    private $id;
    private $password;
    private $plainPassword;

    public function getId()
    {
        return $this->id;
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
}

