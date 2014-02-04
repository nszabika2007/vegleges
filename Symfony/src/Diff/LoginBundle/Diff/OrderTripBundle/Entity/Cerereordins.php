<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cerereordins
 *
 * @ORM\Table(name="cerereordins")
 * @ORM\Entity
 */
class Cerereordins
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="TripID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tripid;

    /**
     * @var string
     *
     * @ORM\Column(name="cci", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cci;

    /**
     * @var string
     *
     * @ORM\Column(name="date1", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date1;

    /**
     * @var string
     *
     * @ORM\Column(name="dlocality", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dlocality;

    /**
     * @var string
     *
     * @ORM\Column(name="dcountry", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dcountry;

    /**
     * @var string
     *
     * @ORM\Column(name="dscop", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dscop;

    /**
     * @var string
     *
     * @ORM\Column(name="droute", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $droute;

    /**
     * @var string
     *
     * @ORM\Column(name="preiod", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $preiod;

    /**
     * @var string
     *
     * @ORM\Column(name="dgo", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dgo;

    /**
     * @var string
     *
     * @ORM\Column(name="dcome", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dcome;

    /**
     * @var string
     *
     * @ORM\Column(name="cheltuieli", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cheltuieli;

    /**
     * @var string
     *
     * @ORM\Column(name="csalariale", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $csalariale;

    /**
     * @var string
     *
     * @ORM\Column(name="datecreated", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datecreated;

    /**
     * @var string
     *
     * @ORM\Column(name="nrgf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $nrgf;

    /**
     * @var string
     *
     * @ORM\Column(name="namef", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $namef;

    /**
     * @var string
     *
     * @ORM\Column(name="transpif", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $transpif;

    /**
     * @var string
     *
     * @ORM\Column(name="transpintf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $transpintf;

    /**
     * @var string
     *
     * @ORM\Column(name="diaurinaf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $diaurinaf;

    /**
     * @var string
     *
     * @ORM\Column(name="cazaref", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cazaref;

    /**
     * @var string
     *
     * @ORM\Column(name="taxaf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $taxaf;

    /**
     * @var string
     *
     * @ORM\Column(name="altchelf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $altchelf;

    /**
     * @var string
     *
     * @ORM\Column(name="totalf", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totalf;

    /**
     * @var string
     *
     * @ORM\Column(name="datef", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datef;

    /**
     * @var string
     *
     * @ORM\Column(name="nrgd", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $nrgd;

    /**
     * @var string
     *
     * @ORM\Column(name="named", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $named;

    /**
     * @var string
     *
     * @ORM\Column(name="tranpsid", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tranpsid;

    /**
     * @var string
     *
     * @ORM\Column(name="transpintd", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $transpintd;

    /**
     * @var string
     *
     * @ORM\Column(name="diaurnad", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $diaurnad;

    /**
     * @var string
     *
     * @ORM\Column(name="cazared", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cazared;

    /**
     * @var string
     *
     * @ORM\Column(name="taxad", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $taxad;

    /**
     * @var string
     *
     * @ORM\Column(name="altcheld", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $altcheld;

    /**
     * @var string
     *
     * @ORM\Column(name="totald", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $totald;

    /**
     * @var string
     *
     * @ORM\Column(name="dated", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dated;


}
