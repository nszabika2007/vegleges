<?php

namespace Diff\OrderTripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Declaratie
 *
 * @ORM\Table(name="declaratie")
 * @ORM\Entity
 */
class Declaratie
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
     * @ORM\Column(name="tripid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tripid;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", precision=0, scale=0, nullable=false, unique=false)
     */
    private $date;


}
