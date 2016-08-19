<?php

namespace AppBundle\Entity;

/**
 * Test
 */
class Test
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $test;


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
     * Set test
     *
     * @param array $test
     *
     * @return Test
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return array
     */
    public function getTest()
    {
        return $this->test;
    }
}

