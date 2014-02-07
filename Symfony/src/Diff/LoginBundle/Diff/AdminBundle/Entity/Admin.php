<?php

namespace Diff\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="userName", columns={"userName"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class Admin
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
     * @ORM\Column(name="userName", type="string", length=40, precision=0, scale=0, nullable=false, unique=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=260, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=6, precision=0, scale=0, nullable=false, unique=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="university", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $university;


}
