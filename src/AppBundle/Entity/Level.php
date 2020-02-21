<?php

namespace AppBundle\Entity;

/**
 * Level
 */
class Level
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $levelName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $society;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->society = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add society
     *
     * @param \AppBundle\Entity\Society $society
     *
     * @return Level
     */
    public function addSociety(\AppBundle\Entity\Society $society)
    {
        $this->society[] = $society;

        return $this;
    }

    /**
     * Remove society
     *
     * @param \AppBundle\Entity\Society $society
     */
    public function removeSociety(\AppBundle\Entity\Society $society)
    {
        $this->society->removeElement($society);
    }

    /**
     * Get society
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSociety()
    {
        return $this->society;
    }
}
