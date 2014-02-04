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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="TripID", type="integer", nullable=false)
     */
    private $tripid;

    /**
     * @var string
     *
     * @ORM\Column(name="cci", type="text", nullable=true)
     */
    private $cci;

    /**
     * @var string
     *
     * @ORM\Column(name="date1", type="text", nullable=true)
     */
    private $date1;

    /**
     * @var string
     *
     * @ORM\Column(name="dlocality", type="text", nullable=true)
     */
    private $dlocality;

    /**
     * @var string
     *
     * @ORM\Column(name="dcountry", type="text", nullable=true)
     */
    private $dcountry;

    /**
     * @var string
     *
     * @ORM\Column(name="dscop", type="text", nullable=true)
     */
    private $dscop;

    /**
     * @var string
     *
     * @ORM\Column(name="droute", type="text", nullable=true)
     */
    private $droute;

    /**
     * @var string
     *
     * @ORM\Column(name="preiod", type="text", nullable=true)
     */
    private $preiod;

    /**
     * @var string
     *
     * @ORM\Column(name="dgo", type="text", nullable=true)
     */
    private $dgo;

    /**
     * @var string
     *
     * @ORM\Column(name="dcome", type="text", nullable=true)
     */
    private $dcome;

    /**
     * @var string
     *
     * @ORM\Column(name="cheltuieli", type="text", nullable=true)
     */
    private $cheltuieli;

    /**
     * @var string
     *
     * @ORM\Column(name="csalariale", type="text", nullable=true)
     */
    private $csalariale;

    /**
     * @var string
     *
     * @ORM\Column(name="datecreated", type="text", nullable=true)
     */
    private $datecreated;

    /**
     * @var string
     *
     * @ORM\Column(name="nrgf", type="text", nullable=true)
     */
    private $nrgf;

    /**
     * @var string
     *
     * @ORM\Column(name="namef", type="text", nullable=true)
     */
    private $namef;

    /**
     * @var string
     *
     * @ORM\Column(name="transpif", type="text", nullable=true)
     */
    private $transpif;

    /**
     * @var string
     *
     * @ORM\Column(name="transpintf", type="text", nullable=true)
     */
    private $transpintf;

    /**
     * @var string
     *
     * @ORM\Column(name="diaurinaf", type="text", nullable=true)
     */
    private $diaurinaf;

    /**
     * @var string
     *
     * @ORM\Column(name="cazaref", type="text", nullable=true)
     */
    private $cazaref;

    /**
     * @var string
     *
     * @ORM\Column(name="taxaf", type="text", nullable=true)
     */
    private $taxaf;

    /**
     * @var string
     *
     * @ORM\Column(name="altchelf", type="text", nullable=true)
     */
    private $altchelf;

    /**
     * @var string
     *
     * @ORM\Column(name="totalf", type="text", nullable=true)
     */
    private $totalf;

    /**
     * @var string
     *
     * @ORM\Column(name="datef", type="text", nullable=true)
     */
    private $datef;

    /**
     * @var string
     *
     * @ORM\Column(name="nrgd", type="text", nullable=true)
     */
    private $nrgd;

    /**
     * @var string
     *
     * @ORM\Column(name="named", type="text", nullable=true)
     */
    private $named;

    /**
     * @var string
     *
     * @ORM\Column(name="tranpsid", type="text", nullable=true)
     */
    private $tranpsid;

    /**
     * @var string
     *
     * @ORM\Column(name="transpintd", type="text", nullable=true)
     */
    private $transpintd;

    /**
     * @var string
     *
     * @ORM\Column(name="diaurnad", type="text", nullable=true)
     */
    private $diaurnad;

    /**
     * @var string
     *
     * @ORM\Column(name="cazared", type="text", nullable=true)
     */
    private $cazared;

    /**
     * @var string
     *
     * @ORM\Column(name="taxad", type="text", nullable=true)
     */
    private $taxad;

    /**
     * @var string
     *
     * @ORM\Column(name="altcheld", type="text", nullable=true)
     */
    private $altcheld;

    /**
     * @var string
     *
     * @ORM\Column(name="totald", type="text", nullable=true)
     */
    private $totald;

    /**
     * @var string
     *
     * @ORM\Column(name="dated", type="text", nullable=true)
     */
    private $dated;

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
     * Set id
     *
     * @param integer $id
     * @return Cerereordins
     */
	
	public function setId( $id )
	{
		$this -> id = $id ;
		
		return $this ;
	}
	
    /**
     * Set tripid
     *
     * @param integer $tripid
     * @return Cerereordins
     */
    public function setTripid($tripid)
    {
        $this->tripid = $tripid;

        return $this;
    }

    /**
     * Get tripid
     *
     * @return integer 
     */
    public function getTripid()
    {
        return $this->tripid;
    }

    /**
     * Set cci
     *
     * @param string $cci
     * @return Cerereordins
     */
    public function setCci($cci)
    {
        $this->cci = $cci;

        return $this;
    }

    /**
     * Get cci
     *
     * @return string 
     */
    public function getCci()
    {
        return $this->cci;
    }

    /**
     * Set date1
     *
     * @param string $date1
     * @return Cerereordins
     */
    public function setDate1($date1)
    {
        $this->date1 = $date1;

        return $this;
    }

    /**
     * Get date1
     *
     * @return string 
     */
    public function getDate1()
    {
        return $this->date1;
    }

    /**
     * Set dlocality
     *
     * @param string $dlocality
     * @return Cerereordins
     */
    public function setDlocality($dlocality)
    {
        $this->dlocality = $dlocality;

        return $this;
    }

    /**
     * Get dlocality
     *
     * @return string 
     */
    public function getDlocality()
    {
        return $this->dlocality;
    }

    /**
     * Set dcountry
     *
     * @param string $dcountry
     * @return Cerereordins
     */
    public function setDcountry($dcountry)
    {
        $this->dcountry = $dcountry;

        return $this;
    }

    /**
     * Get dcountry
     *
     * @return string 
     */
    public function getDcountry()
    {
        return $this->dcountry;
    }

    /**
     * Set dscop
     *
     * @param string $dscop
     * @return Cerereordins
     */
    public function setDscop($dscop)
    {
        $this->dscop = $dscop;

        return $this;
    }

    /**
     * Get dscop
     *
     * @return string 
     */
    public function getDscop()
    {
        return $this->dscop;
    }

    /**
     * Set droute
     *
     * @param string $droute
     * @return Cerereordins
     */
    public function setDroute($droute)
    {
        $this->droute = $droute;

        return $this;
    }

    /**
     * Get droute
     *
     * @return string 
     */
    public function getDroute()
    {
        return $this->droute;
    }

    /**
     * Set preiod
     *
     * @param string $preiod
     * @return Cerereordins
     */
    public function setPreiod($preiod)
    {
        $this->preiod = $preiod;

        return $this;
    }

    /**
     * Get preiod
     *
     * @return string 
     */
    public function getPreiod()
    {
        return $this->preiod;
    }

    /**
     * Set dgo
     *
     * @param string $dgo
     * @return Cerereordins
     */
    public function setDgo($dgo)
    {
        $this->dgo = $dgo;

        return $this;
    }

    /**
     * Get dgo
     *
     * @return string 
     */
    public function getDgo()
    {
        return $this->dgo;
    }

    /**
     * Set dcome
     *
     * @param string $dcome
     * @return Cerereordins
     */
    public function setDcome($dcome)
    {
        $this->dcome = $dcome;

        return $this;
    }

    /**
     * Get dcome
     *
     * @return string 
     */
    public function getDcome()
    {
        return $this->dcome;
    }

    /**
     * Set cheltuieli
     *
     * @param string $cheltuieli
     * @return Cerereordins
     */
    public function setCheltuieli($cheltuieli)
    {
        $this->cheltuieli = $cheltuieli;

        return $this;
    }

    /**
     * Get cheltuieli
     *
     * @return string 
     */
    public function getCheltuieli()
    {
        return $this->cheltuieli;
    }

    /**
     * Set csalariale
     *
     * @param string $csalariale
     * @return Cerereordins
     */
    public function setCsalariale($csalariale)
    {
        $this->csalariale = $csalariale;

        return $this;
    }

    /**
     * Get csalariale
     *
     * @return string 
     */
    public function getCsalariale()
    {
        return $this->csalariale;
    }

    /**
     * Set datecreated
     *
     * @param string $datecreated
     * @return Cerereordins
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return string 
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set nrgf
     *
     * @param string $nrgf
     * @return Cerereordins
     */
    public function setNrgf($nrgf)
    {
        $this->nrgf = $nrgf;

        return $this;
    }

    /**
     * Get nrgf
     *
     * @return string 
     */
    public function getNrgf()
    {
        return $this->nrgf;
    }

    /**
     * Set namef
     *
     * @param string $namef
     * @return Cerereordins
     */
    public function setNamef($namef)
    {
        $this->namef = $namef;

        return $this;
    }

    /**
     * Get namef
     *
     * @return string 
     */
    public function getNamef()
    {
        return $this->namef;
    }

    /**
     * Set transpif
     *
     * @param string $transpif
     * @return Cerereordins
     */
    public function setTranspif($transpif)
    {
        $this->transpif = $transpif;

        return $this;
    }

    /**
     * Get transpif
     *
     * @return string 
     */
    public function getTranspif()
    {
        return $this->transpif;
    }

    /**
     * Set transpintf
     *
     * @param string $transpintf
     * @return Cerereordins
     */
    public function setTranspintf($transpintf)
    {
        $this->transpintf = $transpintf;

        return $this;
    }

    /**
     * Get transpintf
     *
     * @return string 
     */
    public function getTranspintf()
    {
        return $this->transpintf;
    }

    /**
     * Set diaurinaf
     *
     * @param string $diaurinaf
     * @return Cerereordins
     */
    public function setDiaurinaf($diaurinaf)
    {
        $this->diaurinaf = $diaurinaf;

        return $this;
    }

    /**
     * Get diaurinaf
     *
     * @return string 
     */
    public function getDiaurinaf()
    {
        return $this->diaurinaf;
    }

    /**
     * Set cazaref
     *
     * @param string $cazaref
     * @return Cerereordins
     */
    public function setCazaref($cazaref)
    {
        $this->cazaref = $cazaref;

        return $this;
    }

    /**
     * Get cazaref
     *
     * @return string 
     */
    public function getCazaref()
    {
        return $this->cazaref;
    }

    /**
     * Set taxaf
     *
     * @param string $taxaf
     * @return Cerereordins
     */
    public function setTaxaf($taxaf)
    {
        $this->taxaf = $taxaf;

        return $this;
    }

    /**
     * Get taxaf
     *
     * @return string 
     */
    public function getTaxaf()
    {
        return $this->taxaf;
    }

    /**
     * Set altchelf
     *
     * @param string $altchelf
     * @return Cerereordins
     */
    public function setAltchelf($altchelf)
    {
        $this->altchelf = $altchelf;

        return $this;
    }

    /**
     * Get altchelf
     *
     * @return string 
     */
    public function getAltchelf()
    {
        return $this->altchelf;
    }

    /**
     * Set totalf
     *
     * @param string $totalf
     * @return Cerereordins
     */
    public function setTotalf($totalf)
    {
        $this->totalf = $totalf;

        return $this;
    }

    /**
     * Get totalf
     *
     * @return string 
     */
    public function getTotalf()
    {
        return $this->totalf;
    }

    /**
     * Set datef
     *
     * @param string $datef
     * @return Cerereordins
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;

        return $this;
    }

    /**
     * Get datef
     *
     * @return string 
     */
    public function getDatef()
    {
        return $this->datef;
    }

    /**
     * Set nrgd
     *
     * @param string $nrgd
     * @return Cerereordins
     */
    public function setNrgd($nrgd)
    {
        $this->nrgd = $nrgd;

        return $this;
    }

    /**
     * Get nrgd
     *
     * @return string 
     */
    public function getNrgd()
    {
        return $this->nrgd;
    }

    /**
     * Set named
     *
     * @param string $named
     * @return Cerereordins
     */
    public function setNamed($named)
    {
        $this->named = $named;

        return $this;
    }

    /**
     * Get named
     *
     * @return string 
     */
    public function getNamed()
    {
        return $this->named;
    }

    /**
     * Set tranpsid
     *
     * @param string $tranpsid
     * @return Cerereordins
     */
    public function setTranpsid($tranpsid)
    {
        $this->tranpsid = $tranpsid;

        return $this;
    }

    /**
     * Get tranpsid
     *
     * @return string 
     */
    public function getTranpsid()
    {
        return $this->tranpsid;
    }

    /**
     * Set transpintd
     *
     * @param string $transpintd
     * @return Cerereordins
     */
    public function setTranspintd($transpintd)
    {
        $this->transpintd = $transpintd;

        return $this;
    }

    /**
     * Get transpintd
     *
     * @return string 
     */
    public function getTranspintd()
    {
        return $this->transpintd;
    }

    /**
     * Set diaurnad
     *
     * @param string $diaurnad
     * @return Cerereordins
     */
    public function setDiaurnad($diaurnad)
    {
        $this->diaurnad = $diaurnad;

        return $this;
    }

    /**
     * Get diaurnad
     *
     * @return string 
     */
    public function getDiaurnad()
    {
        return $this->diaurnad;
    }

    /**
     * Set cazared
     *
     * @param string $cazared
     * @return Cerereordins
     */
    public function setCazared($cazared)
    {
        $this->cazared = $cazared;

        return $this;
    }

    /**
     * Get cazared
     *
     * @return string 
     */
    public function getCazared()
    {
        return $this->cazared;
    }

    /**
     * Set taxad
     *
     * @param string $taxad
     * @return Cerereordins
     */
    public function setTaxad($taxad)
    {
        $this->taxad = $taxad;

        return $this;
    }

    /**
     * Get taxad
     *
     * @return string 
     */
    public function getTaxad()
    {
        return $this->taxad;
    }

    /**
     * Set altcheld
     *
     * @param string $altcheld
     * @return Cerereordins
     */
    public function setAltcheld($altcheld)
    {
        $this->altcheld = $altcheld;

        return $this;
    }

    /**
     * Get altcheld
     *
     * @return string 
     */
    public function getAltcheld()
    {
        return $this->altcheld;
    }

    /**
     * Set totald
     *
     * @param string $totald
     * @return Cerereordins
     */
    public function setTotald($totald)
    {
        $this->totald = $totald;

        return $this;
    }

    /**
     * Get totald
     *
     * @return string 
     */
    public function getTotald()
    {
        return $this->totald;
    }

    /**
     * Set dated
     *
     * @param string $dated
     * @return Cerereordins
     */
    public function setDated($dated)
    {
        $this->dated = $dated;

        return $this;
    }

    /**
     * Get dated
     *
     * @return string 
     */
    public function getDated()
    {
        return $this->dated;
    }
}