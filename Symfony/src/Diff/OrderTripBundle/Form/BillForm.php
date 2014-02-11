<?php

namespace Diff\OrderTripBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadInterface AS UploadInterface;
use Diff\BassicLayoutBundle\Entity\Bills AS Bills ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;

Class BillForm implements UploadInterface
{
	
	private $FormBuilder ;
	
	Private $Form ;
	
	private $EntityManager ;
	
	private $TripsRepository ;
	
	private $CondOrder = false ;
	
	private $CondTrip = false ;
	
	private $FormSubmit_URL = "";
	
	private $UID = 0;
	
	private $UserHelper ;
	
	function __construct( FormFactory $FormFactory , EntityManager $EntityManager , UserHelper $UserHelper )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> TripsRepository = $EntityManager -> getRepository('OrderTripBundle:Trips');
		
		$this -> UserHelper = $UserHelper ;
	}
	
	public function Is_ForOrder( $url )
	{
		$this -> CondOrder = true ;
		$this -> FormSubmit_URL = $url ;
	}
	
	public function Is_ForTrip( $url )
	{
		$this -> CondTrip = true ;
		$this -> FormSubmit_URL = $url ;
	}
	
	public function Set_UID( $uid )
	{
		$this -> UID = (int) $uid ;
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder
		 		-> add( 'date' , 'text' , array( 
								'label' => 'Date',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'amount' , 'text' , array( 
								'label' => 'Amount',
								'attr' 	=> array( 'class' => 'form-control' )
							) )		
				-> add( 'file_name' , 'file' , array( 
								'label' => 'File',
								'attr' 	=> array( 'class' => 'check_image' )
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
		
		if ( ! $this -> Form -> isValid( ) ) 
			return ;
		
		$UserID = $this -> UserHelper -> Get_CurrentUser( ) -> getId( ) ; 
		
		$User = $this -> EntityManager -> getRepository( 'UserBundle:User' ) -> find( $UserID ) ;
	

		$FormData = $this -> Form -> getData( );
		
		$Files = $Request -> files -> all( ) ;
		$Dir = $Request -> server -> get( 'DOCUMENT_ROOT' ) . $Request -> getBasePath( ) . $this :: BASE_FILE_PATH ;

		$Bills = new Bills();
		 
		if ( $this -> CondTrip )
		{
			$Bills -> setTripId( $this -> UID ); 
			$Dir = $Dir . $this :: UPLOAD_TRIP_PATH ;
			
			$GlobalTrip = $User -> getGlobaltrip( );
			$User -> setGlobaltrip( $GlobalTrip - $FormData[ 'amount' ] ) ;
		}
		else if ( $this -> CondOrder )
		{
			$Bills -> setOrderId( $this -> UID );
			$Dir = $Dir . $this :: UPLOAD_ORDER_PATH ;
			
			$GlobalOrder = $User -> getGlobalorder( ) ;
			$User -> setGlobalorder( $GlobalOrder - $FormData[ 'amount' ] ) ; 
		}
		
		$this -> EntityManager -> flush( );
		
		$Dir .= $this :: FOLDER_BASE_NAME . $this -> UID;
		
		if ( !file_exists( $Dir ) )
			mkdir( $Dir , 0777 , true ) ;
		
		$File = $Files['form']['file_name'] ;
		$FileName = $File -> getClientOriginalName( ) ;
		$File -> move( $Dir , $FileName );

		$Bills -> setDate( new \DateTime( $FormData[ 'date' ] ) )
			   -> setAmount( $FormData[ 'amount' ] ) 
			   -> setFileName( $FileName ) ;
		
		$this -> EntityManager -> persist( $Bills );
		$this -> EntityManager -> flush();
		
	}
	
	public function Generate_BillForm( )
	{
		$this -> Build_Form( );
		
		$this -> FormBuilder -> setAction( $this -> FormSubmit_URL );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>