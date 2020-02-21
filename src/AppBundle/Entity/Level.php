<?php

namespace AppBundle\Entity;

/**
 * Level
 */
class Level
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $levelName;


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
     * Set levelName
     *
     * @param string $levelName
     *
     * @return Level
     */
    public function setLevelName($levelName)
    {
        $this->levelName = $levelName;

        return $this;
    }

    /**
     * Get levelName
     *
     * @return string
     */
    public function getLevelName()
    {
        return $this->levelName;
    }
}

