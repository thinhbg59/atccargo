<?php

namespace AppBundle\Entity;

class Transport
{
    private $id;
    private $userId;
    private $identificator;
    private $startCity;
    private $endCity;
    private $startDate;
    private $endDate;
    private $cargo;
    private $distance;
    private $weight;
    private $damage;
    private $burnedFuel;
    private $fueledFuel;
    private $country;
    private $score;
    private $screenshot;
    private $active;

    public function __construct()
    {
        $this->active = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setIdentificator($identificator)
    {
        $this->identificator = $identificator;

        return $this;
    }

    public function getIdentificator()
    {
        return $this->identificator;
    }

    public function setStartCity($startCity)
    {
        $this->startCity = $startCity;

        return $this;
    }

    public function getStartCity()
    {
        return $this->startCity;
    }

    public function setEndCity($endCity)
    {
        $this->endCity = $endCity;

        return $this;
    }

    public function getEndCity()
    {
        return $this->endCity;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setBurnedFuel($burnedFuel)
    {
        $this->burnedFuel = $burnedFuel;

        return $this;
    }

    public function getBurnedFuel()
    {
        return $this->burnedFuel;
    }

    public function setFueledFuel($fueledFuel)
    {
        $this->fueledFuel = $fueledFuel;

        return $this;
    }

    public function getFueledFuel()
    {
        return $this->fueledFuel;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScreenshot($screenshot)
    {
        $this->screenshot = $screenshot;

        return $this;
    }

    public function getScreenshot()
    {
        return $this->screenshot;
    }

    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }
}

