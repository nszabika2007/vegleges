<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="OrderID", columns={"OrderID"})})
 * @ORM\Entity
 */
class Product
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
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="products")
     * @ORM\JoinColumn(name="OrderID", referencedColumnName="ID")
    */
    protected $Orders;
	
    /**
     * @var string
     *
     * @ORM\Column(name="ProductName", type="text", nullable=false)
     */
    private $productname;

    /**
     * @var float
     *
     * @ORM\Column(name="Price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductURL", type="text", nullable=false)
     */
    private $producturl;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrderID", type="integer", nullable=false)
     */
    private $orderid;
	
	/**
	 *	Get Order Object.
	 *
	 *
	*/
	
	public function setOrders( $Orders )
	{
		$this -> Orders = $Orders;
		
		return $this;
	}
	
	public function getOrders()
	{
		return $this -> Orders;
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
     * Set productname
     *
     * @param string $productname
     * @return Product
     */
    public function setProductname($productname)
    {
        $this->productname = $productname;

        return $this;
    }

    /**
     * Get productname
     *
     * @return string 
     */
    public function getProductname()
    {
        return $this->productname;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set producturl
     *
     * @param string $producturl
     * @return Product
     */
    public function setProducturl($producturl)
    {
        $this->producturl = $producturl;

        return $this;
    }

    /**
     * Get producturl
     *
     * @return string 
     */
    public function getProducturl()
    {
        return $this->producturl;
    }

    /**
     * Set orderid
     *
     * @param integer $orderid
     * @return Product
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
		
        return $this;
    }

    /**
     * Get orderid
     *
     * @return integer 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }
}
