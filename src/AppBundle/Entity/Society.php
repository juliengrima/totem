<?php

namespace AppBundle\Entity;

/**
 * Society
 */
class Society
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $societyName;

    /**
     * @var \AppBundle\Entity\Level
     */
    private $levels;

    /**
     * @var \AppBundle\Entity\Side
     */
    private $side;


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

    /**
     * Set levels
     *
     * @param \AppBundle\Entity\Level $levels
     *
     * @return Society
     */
    public function setLevels(\AppBundle\Entity\Level $levels = null)
    {
        $this->levels = $levels;

        return $this;
    }

    /**
     * Get levels
     *
     * @return \AppBundle\Entity\Level
     */
    public function getLevels()
    {
        return $this->levels;
    }

    /**
     * Set side
     *
     * @param \AppBundle\Entity\Side $side
     *
     * @return Society
     */
    public function setSide(\AppBundle\Entity\Side $side = null)
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get side
     *
     * @return \AppBundle\Entity\Side
     */
    public function getSide()
    {
        return $this->side;
    }
    /**
     * @var \AppBundle\Entity\Media
     */
    private $media;


    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Society
     */
    public function setMedia(\AppBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }
}
