<?php

namespace Diff\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="userName", columns={"userName"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class User implements UserInterface
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
     * @ORM\Column(name="userName", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=260, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="text", nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="text", nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=6, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     */
    private $email;

     /**
     * @var string
     *
     * @ORM\Column(name="tel", type="text", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="university", type="text", nullable=false)
     */
    private $university;
    
	/**
     * @var float
     *
     * @ORM\Column(name="GlobalTrip", type="float", precision=10, scale=0, nullable=true)
     */
    private $globaltrip;

    /**
     * @var float
     *
     * @ORM\Column(name="GlobalOrder", type="float", precision=10, scale=0, nullable=true)
     */
    private $globalorder;
	
	
    public function getRole( )
    {
        return $this -> role;
    }

	public function getId( )
	{
		return $this -> id;
	}
	
	public function getRoles( )
	{
		return array( 'ROLE_'.$this -> role );
	}
	
	public function getSalt( )
	{
		return NULL;
	}
	
	
	
	public function eraseCredentials( )
	{
		
	}
	
	 /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
    		
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set university
     *
     * @param string $university
     * @return User
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string 
     */
    public function getUniversity()
    {
         return $this->university;
    }
	
	 /**
     * Set globaltrip
     *
     * @param float $globaltrip
     * @return User
     */
    public function setGlobaltrip($globaltrip)
    {
        $this->globaltrip = $globaltrip;

        return $this;
    }

    /**
     * Get globaltrip
     *
     * @return float 
     */
    public function getGlobaltrip()
    {
        return $this->globaltrip;
    }

    /**
     * Set globalorder
     *
     * @param float $globalorder
     * @return User
     */
    public function setGlobalorder($globalorder)
    {
        $this->globalorder = $globalorder;

        return $this;
    }

    /**
     * Get globalorder
     *
     * @return float 
     */
    public function getGlobalorder()
    {
        return $this->globalorder;
    }
	
}
