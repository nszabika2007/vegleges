<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="ID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $Created;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $userid;

    /**
     * @var float
     *
     * @ORM\Column(name="ProvidedAmount", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $providedamount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Finalized", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $finalized;

    /**
     * @var string
     *
     * @ORM\Column(name="PDF_Name", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $pdfName;

    /**
     * @var string
     *
     * @ORM\Column(name="BillFileName", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $billfilename;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Diff\OrderTripBundle\Entity\Product", mappedBy="Orders")
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
