<?php

namespace Diff\OrderTripBundle\Form;

use Diff\OrderTripBundle\Entity\Trips AS Trips;
use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;
use Doctrine\ORM\EntityManager AS EntityManager ;

Class TripForm
{
	
	private $FormBuilder ;
	
	Private $Form ;
	
	Private $UserHelper ;
	
	private $EntityManager ;
	
	private $TripsRepository ;
	
	function __construct( FormFactory $FormFactory , UserHelper $UserHelper , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> UserHelper = $UserHelper ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> TripsRepository = $EntityManager -> getRepository('OrderTripBundle:Trips');
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder
		 		-> add( 'StartDate' , 'text' , array( 
								'label' => 'Start Date',
								'attr' 	=> array( 
										'class' => 'form-control datepicker' 
									)
							) )
				-> add( 'ProvidedAmount' , 'text' , array( 
								'label' => 'Provided Amount',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'destination' , 'text' , array( 
								'label' => 'Destination',
								'attr' 	=> array( 'class' => 'form-control' )
							) )			
				-> add( 'Save' , 'submit' , array(
											'attr'	=> array( 
															'class' => 'btn btn-primary pull-right'						
															)
										) ) ;
	}
	
	/**
	*
	*/
	
	public function HandleRequest( Request $Request )
	{
		$this -> Form -> handleRequest( $Request );
		
		if ( $this -> Form -> isValid( ) )
		{
			$FormData = $this -> Form -> getData( );
		
			$UserID = $this -> UserHelper -> Get_UserID( );
			$Trips = new Trips();
			$Trips -> setStartdate( $FormData[ 'StartDate' ] )
					-> setDestination( $FormData[ 'destination' ] )
					-> setProvidedamount( $FormData[ 'ProvidedAmount' ] )
					-> setUserid( $UserID ) ;
			$this -> EntityManager -> persist( $Trips );		
			$this -> EntityManager -> flush( );
		}
	}
	
	/**
	*
	*/
	
	public function Generate_TripForm( )
	{
		$this -> Build_Form( );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>