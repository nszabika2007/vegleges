<?php

namespace Diff\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var integer
     */
    private $userid;

    /**
     * @var float
     */
    private $providedamount;

    /**
     * @var boolean
     */
    private $finalized;

    /**
     * @var string
     */
    private $pdfName;

    /**
     * @var string
     */
    private $billfilename;


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
     * Set created
     *
     * @param \DateTime $created
     * @return Orders
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return Orders
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
     * Set providedamount
     *
     * @param float $providedamount
     * @return Orders
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
     * Set finalized
     *
     * @param boolean $finalized
     * @return Orders
     */
    public function setFinalized($finalized)
    {
        $this->finalized = $finalized;

        return $this;
    }

    /**
     * Get finalized
     *
     * @return boolean 
     */
    public function getFinalized()
    {
        return $this->finalized;
    }

    /**
     * Set pdfName
     *
     * @param string $pdfName
     * @return Orders
     */
    public function setPdfName($pdfName)
    {
        $this->pdfName = $pdfName;

        return $this;
    }

    /**
     * Get pdfName
     *
     * @return string 
     */
    public function getPdfName()
    {
        return $this->pdfName;
    }

    /**
     * Set billfilename
     *
     * @param string $billfilename
     * @return Orders
     */
    public function setBillfilename($billfilename)
    {
        $this->billfilename = $billfilename;

        return $this;
    }

    /**
     * Get billfilename
     *
     * @return string 
     */
    public function getBillfilename()
    {
        return $this->billfilename;
    }
}
