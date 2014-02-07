<?php

namespace Diff\StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadInterface;

class StatsController extends Controller implements UploadInterface
{
	
	CONST FOLDER = "Stats/PDF_STATS_MERGED_" ;
	
	private $UserID = 0;
	private $FromDate ;
	private $ToDate ;
	private $EM ;
	private $MergeAPI ;
	
	private $Redirect_URL = "";
	
    public function indexAction( Request $Request )
    {
        
		if( $Request -> getMethod() != 'POST' )
			return $this -> redirect( $this -> generateUrl( 'user_homepage' ) );
		
		$this -> UserID = $this -> get( 'UserHelper' ) -> Get_CurrentUser() -> getId( );
		$this -> EM = $this->getDoctrine()->getEntityManager();
		
		$Form = $Request -> request ->get( 'form' ) ;
		$this -> FromDate = $Form[ 'from_date' ];
		$this -> ToDate = $Form[ 'to_date' ];
		$Type = $Form[ 'type' ];
		
		$this -> MergeAPI = $this -> get( 'MergeAPI' );
		
		$this -> Redirect_URL = 'http://' .$Request -> getHttpHost( ) . $Request -> getBasePath( ) . self :: BASE_FILE_PATH;
		
		if ( $Type == "ORDER" )
			$Comd = $this -> orderHandler( ) ;
		else if ( $Type == 'TRIP' )
			$Comd = $this -> tripHandler( ) ;
		
		if ( $Comd === FALSE )
			return $this -> redirect( $this -> generateURL( 'user_homepage' ) );
					
		$this -> Redirect_URL .= '.pdf' ;
		return $this -> redirect( $this -> Redirect_URL );
    }
	
	private function orderHandler( )
	{
		$this -> Redirect_URL .= self :: UPLOAD_ORDER_PATH . self :: FOLDER . $this -> UserID ;
		
		$Query = $this -> EM->createQuery(
		    "SELECT o
		    FROM OrderTripBundle:Orders o
		    WHERE o.userid=:user AND o.finalized = :fin" 
		) 
		  -> setParameter( 'user' , $this -> UserID ) 
		  -> setParameter( 'fin' , 1 );
		$Orders = $Query->getResult();
		
		if( count( $Orders ) < 1 )
			return FALSE ;
		
		$this -> MergeAPI ->Is_MergeTypeOrder();
		
		foreach( $Orders AS $num => $Order )
		{
			$Created = (array)$Order -> getCreated( );
			$Created = date( 'Y-m-d' , strtotime( $Created[ 'date' ] ) );
		
			if ( $Created >= $this -> FromDate AND $Created <= $this -> ToDate  )
				$this -> MergeAPI -> Add_ID( $Order -> getId() ) ;
		}
		$this -> MergeAPI -> ExecuteCall();
		return TRUE ;
	}
	
	private function tripHandler( )
	{
		$this -> Redirect_URL .= self :: UPLOAD_TRIP_PATH . self :: FOLDER . $this -> UserID ;
		
		$Query = $this -> EM->createQuery(
		    "SELECT t
		    FROM OrderTripBundle:Trips t
		    WHERE t.userid=:user AND t.finalize = :fin AND t.enddate >= :from AND t.startdate <= :start" 
		) 
		  -> setParameter( 'user' , $this -> UserID ) 
		  -> setParameter( 'fin' , 1 )
		  -> setParameter( 'from' , $this -> FromDate )
		  -> setParameter( 'start' , $this -> ToDate );
		$Trips = $Query->getResult();
		
		if( count( $Trips ) < 1 )
			return FALSE ; 
		  
		$this -> MergeAPI ->Is_MergeTypeTrip();
		
		foreach( $Trips AS $num => $Trip )
			$this -> MergeAPI -> Add_ID( $Trip -> getId() );
		
		$this -> MergeAPI -> ExecuteCall();
		return TRUE ;
	}
	
}
