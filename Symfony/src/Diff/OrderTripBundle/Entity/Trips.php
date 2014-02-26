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
     * @var boolean
     *
     * @ORM\Column(name="flag_cerere", type="boolean", nullable=true)
     */
    private $flagCerere;

     /**
     * @var boolean
     *
     * @ORM\Column(name="flag_declaratie", type="boolean", nullable=true)
     */
    private $flagDeclaratie;

     /**
     * @var boolean
     *
     * @ORM\Column(name="flag_invitatie", type="boolean", nullable=true)
     */
    private $flagInvitatie;

     /**
     * @var boolean
     *
     * @ORM\Column(name="upload_finalize", type="boolean", nullable=true)
     */
    private $uploadFinalize;
	
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
	// New COlumns from 2014-02-25
	/**
     * Set flagCerere
     *
     * @param boolean $flagCerere
     * @return Trips
     */
    public function setFlagCerere($flagCerere)
    {
        $this->flagCerere = $flagCerere;

        return $this;
    }

    /**
     * Get flagCerere
     *
     * @return boolean 
     */
    public function getFlagCerere()
    {
        return $this->flagCerere;
    }

    /**
     * Set flagDeclaratie
     *
     * @param boolean $flagDeclaratie
     * @return Trips
     */
    public function setFlagDeclaratie($flagDeclaratie)
    {
        $this->flagDeclaratie = $flagDeclaratie;

        return $this;
    }

    /**
     * Get flagDeclaratie
     *
     * @return boolean 
     */
    public function getFlagDeclaratie()
    {
        return $this->flagDeclaratie;
    }

    /**
     * Set flagInvitatie
     *
     * @param boolean $flagInvitatie
     * @return Trips
     */
    public function setFlagInvitatie($flagInvitatie)
    {
        $this->flagInvitatie = $flagInvitatie;

        return $this;
    }

    /**
     * Get flagInvitatie
     *
     * @return boolean 
     */
    public function getFlagInvitatie()
    {
        return $this->flagInvitatie;
    }

    /**
     * Set uploadFinalize
     *
     * @param boolean $uploadFinalize
     * @return Trips
     */
    public function setUploadFinalize($uploadFinalize)
    {
        $this->uploadFinalize = $uploadFinalize;

        return $this;
    }

    /**
     * Get uploadFinalize
     *
     * @return boolean 
     */
    public function getUploadFinalize()
    {
        return $this->uploadFinalize;
    }
	
}
