<?php

namespace Diff\BassicLayoutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity
 */
class Files
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
     * @var string
     *
     * @ORM\Column(name="file_name", type="text", nullable=false)
     */
    private $fileName;

    /**
     * @var integer
     *
     * @ORM\Column(name="trip_id", type="integer", nullable=true)
     */
    private $tripId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="desription", type="text", nullable=false)
     */
    private $desription;


}
