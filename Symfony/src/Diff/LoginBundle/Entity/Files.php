<?php

namespace Diff\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Files
 */
class Files
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var integer
     */
    private $tripId;

    /**
     * @var integer
     */
    private $orderId;

    /**
     * @var string
     */
    private $desription;


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
     * Set fileName
     *
     * @param string $fileName
     * @return Files
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set tripId
     *
     * @param integer $tripId
     * @return Files
     */
    public function setTripId($tripId)
    {
        $this->tripId = $tripId;

        return $this;
    }

    /**
     * Get tripId
     *
     * @return integer 
     */
    public function getTripId()
    {
        return $this->tripId;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     * @return Files
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set desription
     *
     * @param string $desription
     * @return Files
     */
    public function setDesription($desription)
    {
        $this->desription = $desription;

        return $this;
    }

    /**
     * Get desription
     *
     * @return string 
     */
    public function getDesription()
    {
        return $this->desription;
    }
}
