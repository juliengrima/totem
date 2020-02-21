<?php

namespace AppBundle\Entity;

/**
 * Society
 */
class Society
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $societyName;


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
     * Set societyName
     *
     * @param string $societyName
     *
     * @return Society
     */
    public function setSocietyName($societyName)
    {
        $this->societyName = $societyName;

        return $this;
    }

    /**
     * Get societyName
     *
     * @return string
     */
    public function getSocietyName()
    {
        return $this->societyName;
    }
}

