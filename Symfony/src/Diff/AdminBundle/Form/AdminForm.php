<?php

namespace Diff\AdminBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\AdminBundle\Entity\Admin AS Admin ;

Class AdminForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $UserHelper ;
	
	Private $UsersRepository ;
	
	Private $EntityManager ;
	
	function __construct( FormFactory $FormFactory , UserHelper $UserHelper , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' , array(
					'validation_groups' => array('Admin'))) ;
		
		$this -> UserHelper = $UserHelper ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> UsersRepository = $EntityManager -> getRepository( 'AdminBundle:Admin' ) ;
	}
	
	private function Build_AdminForm( )
	{
		$this 	-> FormBuilder 
				-> add( 'userName' , 'text' , array( 
								'label' => 'Username',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'firstName' , 'text' , array( 
								'label' => 'FirstName',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'lastName' , 'text' , array( 
								'label' => 'LastName',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				->add('role', 'choice', array(
								'label' => 'Role',
								'choices'   => array('USER' => 'User', 'ADMIN' => 'Admin'),
								'attr' 	=> array( 'class' => 'form-control' )
							))
				-> add( 'email' , 'email' , array( 
								'label' => 'Email',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'tel' , 'text' , array( 
					'label' => 'Phone Number',
					'attr' 	=> array( 'class' => 'form-control' )
				) )
				-> add( 'university' , 'text' , array( 
					'label' => 'University',
					'attr' 	=> array( 'class' => 'form-control' )
				) )
				-> add( 'Save' , 'submit' , array(
								'attr'	=> array( 
												'class' => 'btn btn-primary pull-right'						
												)
							) ) ;
	}
	
	public function HandleRequest( Request $Request )
	{	
		$this -> Form -> handleRequest( $Request );
		
		if ( $this -> Form -> isValid( ) ) 
		{
			$FormData = $this -> Form -> getData( );
			$Admin = new Admin();
			if(1)
			{
				
				$Admin 	-> setUsername( $FormData[ 'userName' ] )
						-> setPassword( $this->generateRandomString() )
						-> setFirstname( $FormData[ 'firstName' ] )
						-> setLastname( $FormData[ 'lastName' ] )
						-> setRole( $FormData[ 'role' ])
						-> setEmail( $FormData[ 'email' ] )
						-> setTel( $FormData[ 'tel' ])
						-> setUniversity( $FormData[ 'university' ] );
				$this -> EntityManager -> persist( $Admin );	
				$this -> EntityManager -> flush( );
			}
			else
			{
				echo 'Hiba';
			}
		}
	}
	
	
	public function Generate_AdminForm( )
	{
		$this -> Build_AdminForm( );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
	private function generateRandomString() 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$randomString = '';
		for ($i = 0; $i < 10; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
}

?>