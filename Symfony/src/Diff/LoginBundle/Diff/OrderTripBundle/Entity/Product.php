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
     * @ORM\Column(name="ID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductName", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $productname;

    /**
     * @var float
     *
     * @ORM\Column(name="Price", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductURL", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $producturl;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrderID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $orderid;

    /**
     * @var \Diff\OrderTripBundle\Entity\Orders
     *
     * @ORM\ManyToOne(targetEntity="Diff\OrderTripBundle\Entity\Orders", inversedBy="products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="OrderID", referencedColumnName="ID", nullable=true)
     * })
     */
    private $Orders;


}
