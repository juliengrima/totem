<?php

namespace AppBundle\Entity;

/**
 * Side
 */
class Side
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sideName;

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
     * Set sideName
     *
     * @param string $sideName
     *
     * @return Side
     */
    public function setSideName($sideName)
    {
        $this->sideName = $sideName;

        return $this;
    }

    /**
     * Get sideName
     *
     * @return string
     */
    public function getSideName()
    {
        return $this->sideName;
    }

    /**
     * Add society
     *
     * @param \AppBundle\Entity\Society $society
     *
     * @return Side
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
