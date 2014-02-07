<?php

namespace Diff\BassicLayoutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bills
 *
 * @ORM\Table(name="bills")
 * @ORM\Entity
 */
class Bills
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="trip_id", type="integer", nullable=true)
     */
    private $tripId;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="text", nullable=false)
     */
    private $fileName;


}
