<?php

namespace Diff\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bills
 */
class Bills
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $orderId;

    /**
     * @var integer
     */
    private $tripId;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $fileName;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Bills
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     * @return Bills
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
     * Set tripId
     *
     * @param integer $tripId
     * @return Bills
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
     * Set amount
     *
     * @param float $amount
     * @return Bills
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     * @return Bills
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
}
