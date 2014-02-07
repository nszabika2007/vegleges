<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="global")
 * @ORM\Entity
 */
class Globals
{
   /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

   /**
     * @var float
     *
     * @ORM\Column(name="GlobalTrip", type="float", precision=10, scale=0, nullable=false)
     */
    private $globaltrip;

    /**
     * @var float
     *
     * @ORM\Column(name="GlobalOrder", type="float", precision=10, scale=0, nullable=false)
     */
    private $globalorder;


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
     * Set globaltrip
     *
     * @param float $globaltrip
     * @return Global
     */
    public function setGlobaltrip($globaltrip)
    {
        $this->globaltrip = $globaltrip;

        return $this;
    }

    /**
     * Get globaltrip
     *
     * @return float 
     */
    public function getGlobaltrip()
    {
        return $this->globaltrip;
    }

    /**
     * Set globalorder
     *
     * @param float $globalorder
     * @return Global
     */
    public function setGlobalorder($globalorder)
    {
        $this->globalorder = $globalorder;

        return $this;
    }

    /**
     * Get globalorder
     *
     * @return float 
     */
    public function getGlobalorder()
    {
        return $this->globalorder;
    }
}
