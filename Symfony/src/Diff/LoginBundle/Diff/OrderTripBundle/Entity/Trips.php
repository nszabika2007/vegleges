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
     * @ORM\Column(name="ID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartDate", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EndDate", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $enddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $userid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="finalize", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $finalize;

    /**
     * @var float
     *
     * @ORM\Column(name="ProvidedAmount", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $providedamount;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $destination;


}
