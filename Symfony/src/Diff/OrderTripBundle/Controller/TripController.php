<?php 

namespace Diff\OrderTripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

Class TripController extends Controller
{
	
	private $TripsRepository ; 
	private $UserID = 0;
	private $Status = false ;
	
	private $BillTableData ;
	private $TableData ;
	
	private $TripObject ;
	private $AmountContent ;
	
	private $UserObj ;
	
	private function init()
	{
		$this -> TripsRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Trips');
		
		$this -> UserObj = $this -> get( 'UserHelper' ) -> Get_CurrentUser();
		
		$this -> UserID = $this -> UserObj -> getId( ) ;
	}
	
	public function generateTableContent($TripID)
	{
		$this -> init( ) ;
		$Request = Request::createFromGlobals();
		
		$this -> TripObject = $this -> TripsRepository -> findById( $TripID );
		$this -> TripObject = $this -> TripObject[0] ;
		$URL = 'http://' . $Request -> getHttpHost() . $Request -> getBasePath( ) . '/Files/Trips/Bundle_' . $TripID . '/' ;
		$FilesRepository = $this -> getDoctrine() -> getRepository('BassicLayoutBundle:Files');
		$BillRepository = $this -> getDoctrine() -> getRepository('BassicLayoutBundle:Bills');
		
		$Files = $FilesRepository -> findByTrip_id( $TripID ,  array('id' => 'DESC'));
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		
		$Bills = $BillRepository -> findByTrip_id( $TripID ,  array('id' => 'DESC'));
		
		$this -> TableData = $this -> renderView( 	$view = 'OrderTripBundle:Trip:ViewTripTable.html.php', 
											$parameters = array( 
												'Files'			=> $Files ,
												'TableHelper'	=> $TableHelper ,
												'URL' 			=> $URL ,
												'TripID'		=> $TripID 
											)
										);
		
		$this -> BillTableData = $this -> renderView( 	$view = 'OrderTripBundle:Bill:BillTable.html.php', 
											$parameters = array( 
												'Bills'			=> $Bills ,
												'TableHelper'	=> $TableHelper ,
												'URL' 			=> $URL ,
												'TripID'		=> $TripID 
											)
										);
		
		$this -> AmountContent = $this 	-> get( 'AmountHelper' ) 
					-> Is_ForTrip( ) 
					-> AddID( $TripID ) 
					-> GetAmount( ) 
					-> Get_HTMLContent( $this -> TripObject -> getProvidedamount() );
		
	}
	
	public function indexAction( Request $Request )
	{
		$this -> init();
		
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		$TripForm = $this -> get( 'TripForm' );
		
		$Form = $TripForm -> Generate_TripForm( ) ;
		
		$TripForm -> HandleRequest( $Request );
		
		$Trips = $this -> TripsRepository -> findByUserid( $this -> UserID ,  array('id' => 'DESC'));
		
		$TableData = $this -> renderView( 	$view = 'OrderTripBundle:Trip:MyTripsTable.html.php', 
											$parameters = array( 
												'Trips'			=> $Trips ,
												'TableHelper'	=> $TableHelper ,
											)
										);
		$SumBills = 0;								
		$AmountHelper = $this 	-> get( 'AmountHelper' )
								-> Is_ForTrip();
		foreach( $Trips AS $num => $Trip )
		{
			$SumBills+= $AmountHelper 	-> AddID( $Trip -> getId() )
										-> GetAmount( )
										-> GetBillAmount( );
		}
		
		// Getting for for stats
		
		$StatsForm = $this ->get( 'StatsForm' );
		$SForm = $StatsForm -> Is_ForTrip( )
							-> Generate_Form( ) ;
		
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:Trip:MyTrips.html.php' )
						-> Set_PageTitle( 'My Trips' )
						-> Set_TemplateParamter( Array(
													'TableData'		=> $TableData ,
													'Form' 			=> $Form -> createView( ) ,
													'StatsForm'		=> $SForm -> createView( ) ,
													'SumBills'		=> $SumBills ,
													'GlobalAmount'	=> $this -> get( 'GlobalHelper' ) -> ReturnTrip( )
												) ) 
						-> GenerateTemplate( );
	}	
	
	/**
	 * 
	 */
	
	public function viewAction( $TripID , $Finalize = "" , Request $Request )
	{
		$this -> init( ) ;
		$TripID = (int) $TripID ;
		
		$this -> generateTableContent($TripID) ;
		
		$this -> Status = ( $this -> TripObject -> getFinalize( ) ) ? TRUE : FALSE ;
		
		$BillForm = $this -> get( 'BillForm' );
		$BillForm -> Is_ForTrip( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
		$BillForm -> Set_UID( $TripID );
		$FormB = $BillForm -> Generate_BillForm( ) ;
		
		$BillForm -> HandleRequest( $Request );
		
		// Declaratie
		$DeclaratieF = $this -> get( 'DeclaratieForm' ) ;
		
		$DeclaratieForm = $DeclaratieF -> Generate_DeclaratieForm( $this -> generateUrl( 'trip_declaratie' , array( 'TripID' => $TripID ) ) );
		
		if( $Request -> getMethod() == 'POST' )
			return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
		
		unset( $Request );
		
		$CerereOrdinForm = $this -> get( 'CerereOrdinForm' );
		
		$CerereOrdinFormm =$CerereOrdinForm -> Generate_TripForm ( 
						$this -> generateUrl( 'trip_cerere' , array( 'TripID' => $TripID ) ) 
															);
					
		$URL_Finalize = $this -> generateUrl( 'finalize_trip' , array( 'TripID' => $TripID ) ) ;
		
		$Declaratie_URL = $this -> Is_Declaratie( $TripID );
		$Cerere_URL = $this -> Is_Cerere( $TripID ) ;								
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:Trip:ViewTrip.html.php' )
						-> Set_PageTitle( 'Trip #'.$TripID )
						-> Set_TemplateParamter( Array(
													'Status'		=> $this -> Status ,
													'TripID'		=> $TripID	,
													'TableData'		=> $this -> TableData , 
													'BillTableData'	=> $this -> BillTableData ,
													'FormBill'		=> $FormB -> createView( ) 	,
													'URL_Finalize' 	=> $URL_Finalize ,
													'CerereOrdinForm' => $CerereOrdinFormm -> createView() ,
													'AmountContent'	=> $this -> AmountContent ,
													'DeclaratieForm' => $DeclaratieForm	-> createView()	,
													'Declaratie_URL' => $Declaratie_URL	,
													'CerereURL'				  => $Cerere_URL
											) ) 
						-> GenerateTemplate( );
	}
	
	/**
	 * 
	 */
	
	public function uploadAction( $TripID=0 , Request $Request )
	{
		$this -> init( );
		$TripID = (int)$TripID ;
		$UploadTrip = $this -> get( 'UploadTrip' );
		try
		{
			$UploadTrip :: Set_RequestObject( $Request );
			$UploadTrip :: Set_EntityManager( $this->getDoctrine()->getEntityManager() );
			$UploadTrip -> Set_UniqueID( $TripID );
			$UploadTrip -> Process( );
			print_r ( $Request -> files -> all( ) ) ;
		}
		catch ( \Exception $Error )
		{
			echo $Error -> getMessage( );
		}	
		
		return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
		
	}
	
	/**
	 * 
	 */
	
	public function finalizeTripAction( $TripID )
	{
		$this -> init();
		$this -> generateTableContent($TripID) ;
		
		if ( $this -> TripObject -> getFinalize() )
			return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
		
		try
		{
			$MergeHelper = $this -> get( 'MergeHelper' );
			$MergeHelper -> Set_UniqueID( $TripID );
			$MergeHelper -> Is_ForTrips( );
			$MergeHelper -> Make_BillAndMainPDF($this -> AmountContent . $this ->TableData . $this -> BillTableData );
			$Result = $MergeHelper -> MergeToPDF( );
		}
		catch ( \Exception $Error )
		{
			Echo $Error -> getMessage( );
		}
		
		$this -> TripObject -> setFinalize( 1 )
							-> setEnddate( date( 'Y-m-d' ) );
		$Em =  $this->getDoctrine()->getEntityManager();
		$Em -> persist( $this -> TripObject );
		$Em -> flush( );
		
		return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
	}
	
	/**
	 * 
	 */
	
	public function cerereAction( $TripID , Request $Request )
	{
		$TripID = (int)$TripID ;
		$this -> generateTableContent($TripID) ;
		$CerereOrdinForm = $this -> get( 'CerereOrdinForm' );
		
		$CerereOrdinFormm =$CerereOrdinForm -> Generate_TripForm ( 
						$this -> generateUrl( 'trip_cerere' , array( 'TripID' => $TripID ) ) 
															);	
	
		
		$CerereOrdinForm -> HandleRequest( $Request  , $TripID) ;
		
		$CerereDeOrdinRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Cerereordins');
		$CerereDeOrdin = $CerereDeOrdinRepository -> findByTripid( $TripID );
		
		$CerereDeOrdin =  $CerereDeOrdin[ (count( $CerereDeOrdin )-1 ) ] ;
		
		
		// Handle the stuff
		$CerereDeOridinHandler = $this -> get( 'CerereDeOridinHandler' );
		$view_array = $CerereDeOridinHandler -> HandleView_Generating( $CerereDeOrdin , $this -> UserObj , $this -> TripObject ) ;
		// echo "<pre>";
		// print_r($view_array);
		// echo "</pre>";
		$Content=$this -> renderView( 	$view = 'OrderTripBundle:Trip:CerereDeOrdinView.html.php', 
											$parameters = array( 
												'view_array' => $view_array
											)
										);
			$this -> get( 'PDFHandler' ) -> Set_PDFName( 'CEREREDEORDIN.pdf' )
												   -> Set_PDFContent( $Content )
												   -> Set_PDFFilePath( "Trips/Bundle_$TripID/" )
												   -> Generate_PDF( );				
       
		 return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );				
	}
	
	public function declaratieAction( $TripID , Request $Request )
	{
		$this -> generateTableContent( $TripID );
		$DeclaratieF = $this -> get( 'DeclaratieForm' ) ;
		
		$DeclaratieForm = $DeclaratieF -> Generate_DeclaratieForm( 
			$this -> generateUrl( 'trip_declaratie' , array( 'TripID' => $TripID ) ) 
			);
		
		$DeclaratieF -> HandleRequest( $Request , $TripID ) ;
		
		$DeclaratieRepository = $this -> getDoctrine() -> getRepository( 'OrderTripBundle:Declaratie' );
		$Declaratie = $DeclaratieRepository -> findByTripid( $TripID );
		
		$Declaratie = $Declaratie[ ( count( $Declaratie ) -1 ) ] ;
		//print_r( $Declaratie );
		$DeclaratieHelper = $this -> get( 'DeclaratieHelper' ) ;
		
		$DeclaratieHelper -> set_subsemnatul( $this -> UserObj -> getFirstname() ." " . 
												$this -> UserObj -> getLastname( ) );
		$DeclaratieHelper -> set_institutia(  $this -> UserObj -> getUniversity( ) );
		$DeclaratieHelper -> set_destinatia( $this -> TripObject -> getDestination( ) );
		$StartDate = (array)$this -> TripObject -> getStartdate( ) ;
		$DeclaratieHelper -> set_data( date( 'Y-m-d' , strtotime( $StartDate[ 'date' ] ) ) );	
		$Period = (array)$Declaratie -> getDate();
		$Period = date( 'Y-m-d' , strtotime( $Period['date'] ) ) ;
		$DeclaratieHelper -> set_perioada( $Period );
		$DeclaratieHelper -> set_proiect( $Declaratie -> getCode( ) );		
		$DeclaratieHelper -> set_director( $Declaratie -> getName( ) );		
							
		$view_array = $DeclaratieHelper -> build_declaratie_array( );			
		
		$Content = $this -> renderView( "OrderTripBundle:Trip:DeclaratieView.html.php" ,
										array ( 
											'view_array' => $view_array 
										 )
									);
		$this -> get( 'PDFHandler' ) -> Set_PDFName( 'DECLARATIE.pdf' )
												   -> Set_PDFContent( $Content )
												   -> Set_PDFFilePath( "Trips/Bundle_$TripID/" )
												   -> Generate_PDF( );						
		return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );										
	}
	
	private function Is_Declaratie( $TripID )
	{
		$DeclaratieRepository = $this -> getDoctrine() -> getRepository( 'OrderTripBundle:Declaratie' );
		$Declaratie = $DeclaratieRepository -> findByTripid( $TripID );
		
		if ( count( $Declaratie ) > 0 )
		{
			return $this -> get( 'DIRHelper' ) -> SetUID( $TripID ) -> Get_URLPathForTrip() ;
		}
		
		return false;
	}
	
	private function Is_Cerere( $TripID )
	{
		$CerereDeOrdinRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Cerereordins');
		$CerereDeOrdin = $CerereDeOrdinRepository -> findByTripid( $TripID );
		
		if( count( $CerereDeOrdin ) > 0 )
			return $this -> get( 'DIRHelper' ) -> SetUID( $TripID ) -> Get_URLPathForTrip() ;
		
		return false ;
	}
}

?>