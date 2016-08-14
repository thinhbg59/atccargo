<?php

namespace AppBundle\Entity;

/**
 * ChangeAvatar
 */
class ChangeAvatar
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $avatar;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set avatar
     *
     * @param integer $avatar
     *
     * @return ChangeAvatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return int
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}

