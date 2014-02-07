<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trips
 *
 * @ORM\Table(name="trips", indexes={@ORM\Index(name="UserID", columns={"UserID"})})
 * @ORM\Entity
 */
class Trips
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartDate", type="datetime", nullable=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EndDate", type="datetime", nullable=true)
     */
    private $enddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="finalize", type="boolean", nullable=true)
     */
    private $finalize;
	
	 /**
     * @var float
     *
     * @ORM\Column(name="ProvidedAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $providedamount;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="text", nullable=false)
     */
    private $destination;
	
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
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Trips
     */
    public function setStartdate($startdate)
    {
        $this->startdate = new \DateTime (date( 'Y-m-d' , strtotime ( $startdate )));

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Trips
     */
    public function setEnddate( $enddate )
    {
        $this->enddate = new \DateTime (date( 'Y-m-d' , strtotime ( $enddate )));

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return Trips
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set finalize
     *
     * @param boolean $finalize
     * @return Trips
     */
    public function setFinalize($finalize)
    {
        $this->finalize = $finalize;

        return $this;
    }

    /**
     * Get finalize
     *
     * @return boolean 
     */
    public function getFinalize()
    {
        return $this->finalize;
    }
	
	/**
     * Set providedamount
     *
     * @param float $providedamount
     * @return Trips
     */
    public function setProvidedamount($providedamount)
    {
        $this->providedamount = $providedamount;

        return $this;
    }

    /**
     * Get providedamount
     *
     * @return float 
     */
    public function getProvidedamount()
    {
        return $this->providedamount;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Trips
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }
	
}
