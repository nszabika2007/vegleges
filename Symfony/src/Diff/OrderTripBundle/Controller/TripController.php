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
	
	private $GlobalTrip ; 
	
	private $TotalBilledForSingleTrip = 0;
	
	private function init()
	{
		$this -> TripsRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Trips');
		
		$this -> UserObj = $this -> get( 'UserHelper' ) -> Get_CurrentUser();
		
		$this -> UserID = $this -> UserObj -> getId( ) ;
		
		$this -> GlobalTrip = $this -> get( 'GlobalHelper' ) -> ReturnTrip( ) ;
	}
	
	public function generateTableContent($TripID)
	{
		$this -> init( ) ;
		$Request = Request::createFromGlobals();
		
		$this -> TripObject = $this -> TripsRepository -> findById( $TripID );
		if ( !isset( $this -> TripObject[0] ) or $this -> TripObject[0] -> getUserid( ) != $this -> UserID )
		{
			$URL_invalid = 'http://' . $Request -> getHttpHost() .  $this -> generateURL( "trip_homepage" ) ; 
			 header("Location: $URL_invalid");
			 die();
		}	 
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
		$this -> TotalBilledForSingleTrip = $this 	-> get( 'AmountHelper' ) 
					-> Is_ForTrip( ) 
					-> AddID( $TripID ) 
					-> GetAmount( )
					-> GetBillAmount() ;
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
		
		$Trips = $this -> TripsRepository -> findByUserid( $this -> UserID ,  array('id' => 'DESC'));
		$SumBills = 0;								
		$AmountHelper = $this 	-> get( 'AmountHelper' )
								-> Is_ForTrip();
								
		$ProvidedTotal = $this 	-> get( "SumHelper" )
								-> IsForTrip( )
								-> Load_Totals( )
								-> get_Total(  );						
					
		foreach( $Trips AS $num => $Trip )
		{
			$SumBills+= $AmountHelper 	-> AddID( $Trip -> getId() )
										-> GetAmount( )
										-> GetBillAmount( );
		}
		$SumBills = $ProvidedTotal ;
		$TripForm -> GlobalAmount = $this -> GlobalTrip ; 
		
		$TripID = $TripForm -> HandleRequest( $Request );
		
		if ( $Request -> getMethod( ) == 'POST' )
			 return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );
		
		$TableData = $this -> renderView( 	$view = 'OrderTripBundle:Trip:MyTripsTable.html.php', 
											$parameters = array( 
												'Trips'			=> $Trips ,
												'TableHelper'	=> $TableHelper ,
											)
										);
		
		
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
		$BillForm -> SpentAmount =  $this -> TotalBilledForSingleTrip ;
		$BillForm -> ProvidedAmount =  $this -> TripObject -> getProvidedamount( ) ;
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
		
		$CerereOrdinForm -> Build_Defaults( $this -> TripObject , $this -> UserObj ) ;
		
		$CerereOrdinFormm =$CerereOrdinForm -> Generate_TripForm ( 
						$this -> generateUrl( 'trip_cerere' , array( 'TripID' => $TripID ) ) 
															);
					
		$URL_Finalize = $this -> generateUrl( 'finalize_trip' , array( 'TripID' => $TripID ) ) ;
		
		 
		
		$Declaratie_URL = $this -> Is_Declaratie( $TripID );
		$Cerere_URL = $this -> Is_Cerere( $TripID ) ;	
		
		$TripForm = $this -> get( 'TripForm' );
		$TripForm -> CreateDefaults( $this -> TripObject );
		$FormEditTrip = $TripForm -> Generate_TripForm( $this -> generateURL( 'add_edit_trip' , array( 'TripID' => $TripID ) ) ) ;		
									
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:Trip:ViewTrip.html.php' )
						-> Set_PageTitle( 'Trip #'.$TripID )
						-> Set_TemplateParamter( Array(
													'Status'			=> $this -> Status ,
													'TripID'			=> $TripID	,
													'TripObj'			=> $this -> TripObject ,
													'TableData'			=> $this -> TableData , 
													'BillTableData'		=> $this -> BillTableData ,
													'FormBill'			=> $FormB -> createView( ) 	,
													'URL_Finalize' 		=> $URL_Finalize ,
													'CerereOrdinForm' 	=> $CerereOrdinFormm -> createView() ,
													'AmountContent'		=> $this -> AmountContent ,
													'DeclaratieForm' 	=> $DeclaratieForm	-> createView()	,
													'Declaratie_URL'	=> $Declaratie_URL	,
													'CerereURL'			=> $Cerere_URL ,
													'FormEditTrip' 		=> $FormEditTrip -> createView( ) ,
											) ) 
						-> GenerateTemplate( );
	}
	
	/**
	 * 
	 */
	
	public function uploadAction( $TripID=0 , Request $Request )
	{
			
			
		$this -> init( );
		$this -> generateTableContent($TripID) ;
		$TripID = (int)$TripID ;
		$UploadTrip = $this -> get( 'UploadTrip' );
		$FileName = null ;
		try
		{
			$UploadTrip :: Set_RequestObject( $Request );
			$UploadTrip :: Set_EntityManager( $this->getDoctrine()->getEntityManager() );
			$UploadTrip -> Set_UniqueID( $TripID );
			$Files = $UploadTrip -> Process( );
		}
		catch ( \Exception $Error )
		{
			//echo $Error -> getMessage( );
		}	
		//18
		
		$FileRepo = $this -> getDoctrine() ->getEntityManager() ; // ;
		$File = $FileRepo -> getRepository('BassicLayoutBundle:Files') -> find( $Files -> getId( ) ) ;
		
		$FileName = $File -> getFileName( ) ;
		$File_Array = explode('.', $FileName);
		$image_type = strtolower( $File_Array[1] ) ;
		$NewFileName = "INVITATION.pdf";
		if(  in_array( $image_type , array( 'gif' , 'jpg' ,'png' ,'jpeg' , 'bmp' ) ) && 
							$this -> TripObject -> getFlagInvitatie(  ) == FALSE  ) 
		{
				
				$URL_File = 'http://' . $Request ->getHttpHost() . $Request -> getBasePath( ) ."/Files/Trips/Bundle_".$TripID . "/" . $FileName;
				
				$Image_Array = array ();
				$Image_Array[] = $URL_File ;
				
				$Content = $this -> renderView( 
											'FileHandlerBundle:Merge:Merge_Img.html.php' ,
											array(
												'ImgArray'		=> $Image_Array
											)
									);
									
								
									
				$this -> get( "PDFHandler" ) -> Set_PDFName( $NewFileName )
							-> Set_PDFContent( $Content )
							-> Set_PDFFilePath( "Trips/Bundle_" . $TripID ."/" )
							-> Generate_PDF( )
				;
			$File -> setFileName( $NewFileName );
			$FileRepo -> flush( );								 
		}
		
		$TripRepo = $this -> getDoctrine() ->getEntityManager(); 									   
		$Trip = $TripRepo  -> getRepository('OrderTripBundle:Trips') -> find( $TripID ) ;												   
		$Trip -> setFlagInvitatie( TRUE );
		
		$TripRepo -> flush() ;	
		$this -> CheckToUploadFinalize();
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
		
		

		$ContentPart1 = $this -> renderView( 	$view = 'OrderTripBundle:Cere:CerereDeOrdinViewNewPart1.html.php', 
											$parameters = array( 
												'view_array' => $view_array
											)
										);  
		$ContentPart2 = $this -> renderView( 	$view = 'OrderTripBundle:Cere:CerereDeOrdinViewpt2.html.php', 
											$parameters = array( 
												'view_array' => $view_array
											)
										);
										 
		// echo  $this	-> get( 'BasicLayoutHelper' )  
						// -> Set_TemplatePath( 'OrderTripBundle:Cere:CerereDeOrdinViewNewPart1.html.php' )
						// -> Set_TemplateParamter( Array(
													// 'view_array' => $view_array
											// ) ) -> Set_MenuDisplay( false ) 
						// -> GenerateTemplate( );								
										
		$this -> get( 'MergeCerereAPI' ) -> set_UserID( $this -> UserID );								
										
		$this -> get( 'PDFHandler' ) -> Set_PDFName( 'CEREREDEORDIN.pdf' )
												   -> Set_PDFContent( $ContentPart1 . $ContentPart2 )
												   -> Set_PDFFilePath( "Trips/Bundle_$TripID/" )
												   -> Generate_PDF( );
		$TripRepo = $this -> getDoctrine() ->getEntityManager(); 									   
		$Trip = $TripRepo  -> getRepository('OrderTripBundle:Trips') -> find( $TripID ) ;												   
		$Trip -> setFlagCerere( TRUE );
		
		$TripRepo -> flush() ;	
		$this -> CheckToUploadFinalize();									   
		// d( $view_array );										   
		// die();										   						   				
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
												   
		$TripRepo = $this -> getDoctrine() ->getEntityManager(); 									   
		$Trip = $TripRepo  -> getRepository('OrderTripBundle:Trips') -> find( $TripID ) ;												   
		$Trip -> setFlagDeclaratie( TRUE );
		
		$TripRepo -> flush() ;
		$this -> CheckToUploadFinalize();										   					
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
	
	/**
	 * 
	 */
	
	public function deleteAction( $TripID )
	{
		
		$this -> init();
		$this -> generateTableContent( $TripID ) ;
		
		$BillBundleDelete = $this -> get( 'BillBundleDelete' ) -> IsForTrip( ) -> setID( $TripID ) -> DeleteBills( );
		$PathToTripBundle = $this -> get( 'DIRHelper' ) -> SetUID( $TripID ) -> Get_PathToTripBundle( );
		if( file_exists($PathToTripBundle) )
			system( "rm -rf " . escapeshellarg( $PathToTripBundle ) );
		
		$ProvidedAmount = $this -> TripObject -> getProvidedamount( ) ;
		
		 $em = $this->getDoctrine()->getEntityManager();
	     $em->remove( $this -> TripObject );
	     $em->flush();
		
		$em_user = $this->getDoctrine()->getEntityManager();
		$User = $em_user -> getRepository( 'UserBundle:User' ) -> find( $this -> UserID ) ;
		
		$GlobalTrip = $User -> getGlobaltrip( );
		$User -> setGlobaltrip( $GlobalTrip + $ProvidedAmount ) ;
		$em_user -> flush();
		return $this -> redirect( $this -> generateUrl( 'trip_homepage' ) );	
	}
	 
	public function addAction( $TripID = NULL , Request $Request )
	{
		$TripID = (int) $TripID ;
		
		if ( $TripID > 0 )
			$this -> generateTableContent( $TripID ) ;
		
		$TripForm = $this -> get( 'TripForm' );
		$TripForm -> Generate_TripForm( ) ;	
		$TripForm -> GlobalAmount = $this -> GlobalTrip ; 
		$TripForm -> HandleRequest( $Request , $TripID );
		
		if ( $TripID > 0 )
			return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );	
		
		return $this -> redirect( $this -> generateUrl( 'trip_homepage' ) );	
	}
	
	private function CheckToUploadFinalize( )
	{
		return ;
	}
	
	public function uploadfinalizeAction( $TripID )
	{
		$this -> init( );
		$this -> generateTableContent( $TripID ) ;
		$TripRepo = $this -> getDoctrine() ->getEntityManager(); 									   
		$Trip = $TripRepo  -> getRepository('OrderTripBundle:Trips') -> find( $this -> TripObject -> getId( ) ) ;												   
		if ( $Trip -> getFlagInvitatie(  ) && $Trip -> getFlagDeclaratie(  ) && $Trip -> getFlagCerere(  ) )
		{
			$Trip -> setUploadFinalize(TRUE) ;	
			$TripRepo -> flush() ;
			
			$FileRepo = $this -> getDoctrine() ->getEntityManager() ; // ;
			$File = $FileRepo -> getRepository('BassicLayoutBundle:Files') -> findByTripId( $TripID , array( 'id' => 'ASC' ) , 1 ) ;
			$File = $File[0] ;  
			$MergeAPI = $this -> get( "MergeAPI" ); 
			$MergeAPI -> Is_MergeTypeTrip( ) -> Is_SingleDoc( ) 
			-> Set_TripUploadFinalize( $File -> getFileName( ) ) -> Add_ID( $TripID );
			echo $MergeAPI -> ExecuteCall(  );
			
		}	
		else 
			{
				$this -> get( "SessionHelper" ) -> set_ErrorFlashData( "Not all of the necesary files were uploaded !" );
			}	

		return $this -> redirect( $this -> generateUrl( 'view_trip' , array( 'TripID' => $TripID ) ) );	
	}
	
}

?>