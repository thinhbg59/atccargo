<?php

namespace AppBundle\Entity;

/**
 * Class Transport
 */
class Transport
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var string
     */
    private $identificator;

    /**
     * @var string
     */
    private $startCity;

    /**
     * @var string
     */
    private $endCity;

    /**
     * @var datetime
     */
    private $startDate;

    /**
     * @var datetime
     */
    private $endDate;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var integer
     */
    private $distance;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var integer
     */
    private $damage;

    /**
     * @var integer
     */
    private $burnedFuel;

    /**
     * @var integer
     */
    private $fueledFuel;

    /**
     * @var string
     */
    private $country;

    /**
     * @var integer
     */
    private $score;

    /**
     * @var string
     */
    private $screenshot;

    /**
     * @var integer
     */
    private $active;

    public function __construct()
    {
        $this->active = 0;
    }

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
     * Set id
     *
     * @param integer $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set identificator
     *
     * @param string $identificator
     *
     * @return $this
     */
    public function setIdentificator($identificator)
    {
        $this->identificator = $identificator;

        return $this;
    }

    /**
     * Get identificator
     *
     * @return string
     */
    public function getIdentificator()
    {
        return $this->identificator;
    }

    /**
     * Set start city
     *
     * @param string $startCity
     *
     * @return $this
     */
    public function setStartCity($startCity)
    {
        $this->startCity = $startCity;

        return $this;
    }

    /**
     * Get start city
     *
     * @return string
     */
    public function getStartCity()
    {
        return $this->startCity;
    }

    /**
     * Set end city
     *
     * @param string $endCity
     *
     * @return $this
     */
    public function setEndCity($endCity)
    {
        $this->endCity = $endCity;

        return $this;
    }

    /**
     * Get end city
     *
     * @return string
     */
    public function getEndCity()
    {
        return $this->endCity;
    }

    /**
     * Set start date
     *
     * @param datetime $startDate
     *
     * @return $this
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get start date
     *
     * @return datetime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set end date
     *
     * @param datetime $endDate
     *
     * @return $this
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get end date
     *
     * @return datetime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return $this
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set damage
     *
     * @param integer $damage
     *
     * @return $this
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get damage
     *
     * @return integer
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set burned fuel
     *
     * @param integer $burnedFuel
     *
     * @return $this
     */
    public function setBurnedFuel($burnedFuel)
    {
        $this->burnedFuel = $burnedFuel;

        return $this;
    }

    /**
     * Get burned fuel
     *
     * @return integer
     */
    public function getBurnedFuel()
    {
        return $this->burnedFuel;
    }

    /**
     * Set fueled fuel
     *
     * @param integer $fueledFuel
     *
     * @return $this
     */
    public function setFueledFuel($fueledFuel)
    {
        $this->fueledFuel = $fueledFuel;

        return $this;
    }

    /**
     * Get fueled fuel
     *
     * @return integer
     */
    public function getFueledFuel()
    {
        return $this->fueledFuel;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return $this
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set screenshot
     *
     * @param string $screenshot
     *
     * @return $this
     */
    public function setScreenshot($screenshot)
    {
        $this->screenshot = $screenshot;

        return $this;
    }

    /**
     * Get screenshot
     *
     * @return string
     */
    public function getScreenshot()
    {
        return $this->screenshot;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }
}

