<?php

namespace Diff\OrderTripBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;

use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Product AS Product ;

Class ProductForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $ProductRepository ;
	
	Private $EntityManager ;
	
	Private $OrderID =0;
	
	function __construct( FormFactory $FormFactory , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> ProductRepository = $EntityManager -> getRepository( 'OrderTripBundle:Product' ) ;
	}
	
	public function SetOrderID( $OrderID )
	{
		$this -> OrderID = $OrderID;

		return $this;
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder 
				-> add( 'ProductName' , 'text' , array( 
								'label' => 'Product Name',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Price' , 'text' , array( 
								'label' => 'Price',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'ProductURL' , 'text' , array( 
								'label' => 'Product URL',
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
	
	public function HandleRequest( Request $Request , $Orders)
	{	
		$this -> Form -> handleRequest( $Request );
		
		if ( $this -> Form -> isValid( ) ) 
		{
			$FormData = $this -> Form -> getData( );
			// echo $this -> OrderID;
			// die( $this -> OrderID );
			$Product = new Product();
			$Product -> setProductname( $FormData[ 'ProductName' ] )
					 -> setPrice( $FormData[ 'Price' ] )
					 -> setOrderid( $this -> OrderID )
					 -> setProducturl( $FormData[ 'ProductURL' ] )
					 -> setOrders( $Orders );
					
			$this -> EntityManager -> persist( $Product );		
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