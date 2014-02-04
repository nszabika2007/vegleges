<?php

namespace Diff\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $productname;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $producturl;

    /**
     * @var integer
     */
    private $orderid;


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
