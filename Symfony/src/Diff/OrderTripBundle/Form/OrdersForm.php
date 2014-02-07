<?php

namespace Diff\OrderTripBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Orders AS Orders ;

Class OrdersForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $UserHelper ;
	
	Private $OrderRepository ;
	
	Private $EntityManager ;
	
	function __construct( FormFactory $FormFactory , UserHelper $UserHelper , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' , array(
					'validation_groups' => array('Orders'))) ;
		
		$this -> UserHelper = $UserHelper ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> OrderRepository = $EntityManager -> getRepository( 'OrderTripBundle:Orders' ) ;
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder 
				-> add( 'ProvidedAmount' , 'text' , array( 
								'label' => 'Amount',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Created' , 'text' , array( 
								'label' => 'Order Date',
								'attr' 	=> array( 
													'class' => 'form-control datepicker',					
								)
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
			$Orders = new Orders();
			$Orders -> setProvidedamount( $FormData[ 'ProvidedAmount' ] )
					-> setUserid( $UserID )
					-> setCreated( $FormData[ 'Created' ] );
			$this -> EntityManager -> persist( $Orders );		
			$this -> EntityManager -> flush( );
		}
	}
	
	/**
	*
	*/
	
	public function Generate_OrdersForm( )
	{
		$this -> Build_Form( );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>