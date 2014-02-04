<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Orders
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
     * @var \DateTime
     *
     * @ORM\Column(name="Created", type="datetime", nullable=false)
     */
    private $Created;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var float
     *
     * @ORM\Column(name="ProvidedAmount", type="float", precision=10, scale=0, nullable=false)
     */
    private $providedamount;
	
	/**
     * @var boolean
	 *
	 * @ORM\Column(name="Finalized", type="boolean", nullable=true)
     */
    private $finalized;

    /**
     * @var string
	 *
	 * @ORM\Column(name="PDF_Name", type="text", nullable=true)
     */
    private $pdfName;

    /**
     * @var string
	 *
	 * @ORM\Column(name="BillFileName", type="text", nullable=true)
     */
    private $billfilename;
	
	/**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="Orders")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
	
	public function GetProducts( )
	{
		return $this -> products;
	}
	
	public function setId( $id )
	{
		$this -> id = $id;
		return $this;
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
     * Set Created
     *
     * @param \DateTime $Created
     * @return Order
     */
    public function setCreated($Created)
    {
        $this->Created = new \DateTime (date( 'Y-m-d H:i:s' , strtotime ( $Created )));
        return $this;
    }

    /**
     * Get Created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->Created;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return Order
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
     * @return Order
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
