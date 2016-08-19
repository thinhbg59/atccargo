<?php

namespace AppBundle\Entity;

class Invitation
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var integer
     */
    protected $code;

    /**
     * @var string
     */
    protected $roles;

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
     * Set code
     *
     * @param integer $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set roles
     *
     * First, switch is transforming roles for valid format
     *
     * @param string $roles
     *
     * @return $this
     */
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

    /**
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }
}

