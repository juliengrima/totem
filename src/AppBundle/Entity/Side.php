<?php

namespace AppBundle\Entity;

/**
 * Side
 */
class Side
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sideName;


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
}

