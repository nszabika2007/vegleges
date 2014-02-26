<?php

namespace Diff\OrderTripBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Orders AS Orders ;
use Diff\OrderTripBundle\Library\SumHelper AS SumHelper;
use Diff\BassicLayoutBundle\Helper\SessionHelper AS SessionHelper;

Class OrdersForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $UserHelper ;
	
	Private $OrderRepository ;
	
	Private $EntityManager ;
	
	private $Defaults ;
	
	private $URL = Null;
	
	private $OrderID = 0;
	
	private $SessionHelper ;
	
	private $ProvidedSum = 0 ;
	
	private $User_EntityManager ;
	
	function __construct( FormFactory $FormFactory , UserHelper $UserHelper 
				, EntityManager $EntityManager ,SumHelper $SumHelper , SessionHelper $SessionHelper  )
	{
		$this -> Defaults = new \stdClass( );
		
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' , array(
					'validation_groups' => array('Orders'))) ;
		
		$this -> UserHelper = $UserHelper ;
		
		$this -> SessionHelper = $SessionHelper ;
		
		$this -> ProvidedSum = $SumHelper -> IsForOrder( ) -> Load_Totals() -> get_Total() ;
		unset( $SumHelper );
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> User_EntityManager = $EntityManager ;
		
		$this -> OrderRepository = $EntityManager -> getRepository( 'OrderTripBundle:Orders' ) ;
	}
	
	private function BuildDefaults( $OrderObj )
	{
		if ( empty( $OrderObj ) )
			return ;
		
		$this -> Defaults -> Amount = $OrderObj -> getProvidedAmount( );
		$this -> Defaults -> Created = ( array )$OrderObj -> getCreated( );
		$this -> Defaults -> Created = date( 'Y-m-d' , strtotime( $this -> Defaults -> Created[ 'date' ] ) ); 
		
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder 
				-> add( 'ProvidedAmount' , 'text' , array( 
								'label' => 'Amount',
								'attr' 	=> array( 'class' => 'form-control' ) ,
								'data'	=> @$this -> Defaults -> Amount 
							) )
				-> add( 'Created' , 'text' , array( 
								'label' => 'Order Date',
								'attr' 	=> array( 
													'class' => 'form-control datepicker',					
								) ,
								'data'	=> @$this -> Defaults -> Created 
							) )
				-> add( 'can_go_negative' , 'checkbox' , array( 
								'label' => 'Provided Amount can be larger then Remaind Global.',
								'attr' 	=> array( 
													'class' => '',					
													'style'	=> 'margin:20px;' ,
												
								) , 'required' => false
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
			
			$GlobalAmount = $this -> UserHelper -> Get_CurrentUser( ) -> getGlobalorder( ) ; 
			$Diffrence = $GlobalAmount  ;
			$DiffrenceSubmit = null ;
			$FormData = $this -> Form -> getData( );
			
			$Old_ProvidedAmount = NULL;
			
			if ( $this -> OrderID > 0 )
			{
				$Orders = $this -> OrderRepository -> find( $this -> OrderID );
				$Old_ProvidedAmount = $Orders -> getProvidedamount( );
				$DiffrenceSubmit = $Diffrence + $Orders -> getProvidedamount( ) - $FormData[ 'ProvidedAmount' ] ;
				
				$Orders -> setProvidedamount( $FormData[ 'ProvidedAmount' ] )
						-> setCreated( $FormData[ 'Created' ] );
			}
			else {
				$UserID = $this -> UserHelper -> Get_UserID( );
				$Orders = new Orders();
				$DiffrenceSubmit = $Diffrence - $FormData[ 'ProvidedAmount' ] ;
				$Orders -> setProvidedamount( $FormData[ 'ProvidedAmount' ] )
						-> setUserid( $UserID )
						-> setCreated( $FormData[ 'Created' ] );
				$this -> EntityManager -> persist( $Orders );					
			}
			$FormData[ 'can_go_negative' ] = (int)$FormData[ 'can_go_negative' ] ;
			if ( $FormData[ 'can_go_negative' ] != 1 )
				if ( $DiffrenceSubmit < 0 )
				{
					
					if ( $GlobalAmount  < 0 )
					$this -> SessionHelper -> set_ErrorFlashData( "You are allready bellow with: " . $GlobalAmount . "!" );
					else
					$this -> SessionHelper -> set_ErrorFlashData( "You have only $Diffrence amount left for spending!" );
					
					return ;
				}
			
			$this -> EntityManager -> flush( );
			
			// Extracting from User global . 
			$ProvidedAmount = $FormData[ 'ProvidedAmount' ] ;
			if ( $Old_ProvidedAmount != NULL )
				$ProvidedAmount = $ProvidedAmount - $Old_ProvidedAmount ;
			
			$User = $this -> User_EntityManager -> getRepository( 'UserBundle:User' ) -> find( $this -> UserHelper -> Get_UserID( ) ) ;
			
			$GlobalOrder = $User -> getGlobalorder( );
			$User -> setGlobalorder( $GlobalOrder - $ProvidedAmount ) ;
			
			$this -> User_EntityManager -> flush( );
			
			return $Orders -> getId( ) ;
		}
	}
	
	/**
	*
	*/
	
	public function set_SubmitURL( $Url )
	{
		$this -> URL = trim( $Url );
	}
	
	public function set_OrderID( $OrderID )
	{
		$this -> OrderID = ( int  ) $OrderID ;
		
		return $this ;
	}
	
	public function Generate_OrdersForm( $OrderObj = null )
	{
		
		$this -> BuildDefaults( $OrderObj );
		
		if( !empty( $this -> URL ) )
			$this -> FormBuilder -> setAction( $this -> URL );
		
		$this -> Build_Form( );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>