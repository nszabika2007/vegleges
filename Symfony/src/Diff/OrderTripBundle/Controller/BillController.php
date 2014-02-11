<?php
namespace Diff\OrderTripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

Class BillController extends Controller
{
	
	private $BillID = 0 ;
	
	private $BillObject ;
	
	private $EntityManager ;
	
	private $UserObj ;
	
	private function init( )
	{
		$this -> EntityManager = $this -> getDoctrine( ) -> getManager( ) ;
		$this -> UserObj = $this -> EntityManager -> getRepository( 'UserBundle:User' ) 
				-> find( $this -> get( 'UserHelper' ) -> Get_CurrentUser( ) -> getId( ) ) ;
		
	}
	
	private function LoadBill( )
	{
		if( $this-> BillID < 1 )
			return ;
		
		$BillRepository = $this -> getDoctrine( ) -> getRepository( 'BassicLayoutBundle:Bills' );
		
		$Bills = $BillRepository -> findById( $this -> BillID );

		$this -> BillObject = $Bills[0] ;
		
	}
	
	/**
	 *
	 */
	
	public function deleteAction( $Type , $ID , $BillID , Request $Request )
	{
		$this -> init();
		$Type = trim( strtoupper( $Type ) );
		$ID = (int)$ID;
		$this -> BillID = (int)$BillID ;
		
		$this -> LoadBill( );
		
		if( $Type == "ORDER" ) 
			$URL = $this -> HandleOrder( $ID );
		if( $Type == "TRIP" )
			$URL = $this -> HandleTrip( $ID );
		
		$this -> EntityManager -> flush( );
		
		$em = $this->getDoctrine( ) -> getEntityManager( );
	    $em -> remove( $this -> BillObject ) ;
	    $em -> flush( ) ;		
		
		return $this -> redirect( $URL ) ;
	}
	
	private function HandleOrder( $ID )
	{
		$PathToOrderBundle = $this -> get( 'DIRHelper' ) -> SetUID( $ID ) -> Get_PathToOrderBundle( ); 
		
		$File = $PathToOrderBundle . $this -> BillObject -> getFilename( ) ;
		$GlobalOrder = $this -> UserObj -> getGlobalorder( ) + $this -> BillObject -> getAmount( ) ;
		d( $GlobalOrder ,1 );
		$this -> UserObj -> setGlobalorder( $GlobalOrder ) ; 
		
		if ( file_exists( $File ) )
			unlink( $File ) ;
		
		return $this -> generateURL( 
									'view_order',
									array ( 
										'OrderID'	=> $ID
									 )
		 ) ; 
	}
	
	private function HandleTrip( $ID )
	{
		$PathToTripBundle = $this -> get( 'DIRHelper' ) -> SetUID( $ID ) -> Get_PathToTripBundle( );
		
		$File = $PathToTripBundle . $this -> BillObject -> getFilename( ) ;
		
		$GlobalTrip = $this -> UserObj -> getGlobaltrip( ) + $this -> BillObject -> getAmount( ) ;
		d( $GlobalTrip ,1 );
		
		$this -> UserObj -> setGlobaltrip( $GlobalTrip ) ;
		
		if ( file_exists( $File ) )
			unlink( $File ) ;
		
		return $this -> generateURL( 
									'view_trip',
									array ( 
										'TripID'	=> $ID
									 )
		 ) ; 
	}
	
}
?>