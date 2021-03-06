<?php

namespace Diff\OrderTripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Security\Core\SecurityContext; 
use Symfony\Component\HttpFoundation\Request;
use Diff\OrderTripBundle\Entity\Orders;

class OrderController extends Controller
{

	Private $UserObject ;	
	
	Private $UserID = 0 ;	
	
	Private $FinalizeStatus = False ;
	
	Private $OrdersPDF_Name ;
	
	private $BillTableData = "";
	
	private $OrderObj;
	
	private $ProductObj;
	
	Private function Load_UserObject( )
	{
		$this -> UserObject = $this -> get( 'UserHelper' ) -> Get_CurrentUser();
		
		$this -> UserID = $this -> UserObject -> getId();
	}	
	
	private function init( $OrderID )
	{
		$UserID = $this -> get( 'UserHelper' ) -> Get_CurrentUser() -> getId() ;
		$OrderRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Orders');
		$Orders = $OrderRepository -> findById( $OrderID );
		if ( !isset( $Orders[0] ) or $Orders[0] -> getUserid() != $UserID )
		{
			$Request = Request::createFromGlobals();
			$URL_invalid = 'http://' . $Request -> getHttpHost() . $this -> generateUrl( 'order_trip_homepage' ) ;
			header("Location: $URL_invalid");
			 die();
		}	
		$this -> OrderObj = $Orders[0]; 
	}
	
	private function getProduct( $ProductID )
	{
		$ProductRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Product');
		$Products = $ProductRepository -> findById( $ProductID );
		$this -> ProductObj = $Products[0];
	}
	
	public function indexAction( Request $Request )
	{
		$this -> Load_UserObject();
		
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		
		$OrderRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Orders');
		
		$OrdersForm = $this -> get( 'OrdersForm' );
		$Form = $OrdersForm -> Generate_OrdersForm() ;
		
		$OrderID = NULL ;
		$OrderID = $OrdersForm -> HandleRequest( $Request );
		
		if ( $OrderID > 0 && $Request -> getMethod( ) == 'POST' )
			return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
		
		$Orders = $OrderRepository -> findByUserid( $this -> UserID ,  array('id' => 'DESC'));
		
		$StatsForm = $this ->get( 'StatsForm' );
		$SForm = $StatsForm -> Is_ForOrder( )
							-> Generate_Form( ) ;
		
		$SumBills = $this -> get ( "SumHelper" ) -> IsForOrder( ) -> Load_Totals() -> get_Total() ;	 
		 return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:Order:MyOrders.html.php' )
						-> Set_PageTitle( 'My Orders' )
						-> Set_TemplateParamter( Array(  
												'TableHelper' 	=> $TableHelper, 
												'Orders'		=> $Orders ,
												'Form'			=> $Form -> createView() ,
												'StatsForm'		=> $SForm -> createView( ) ,
												'SumBills'		=> $SumBills ,
												'GlobalAmount'	=> $this -> get( 'GlobalHelper' ) -> ReturnOrder( )
												) ) 
						-> GenerateTemplate( );
		
	}
	
	private function Generate_BillTable( $OrderID )
	{
		$Request = Request::createFromGlobals();
		$BillRepository = $this -> getDoctrine() -> getRepository('BassicLayoutBundle:Bills');
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		$Bills = $BillRepository -> findByOrder_id( $OrderID ,  array('id' => 'DESC'));
		$URL = 'http://' . $Request -> getHttpHost() . $Request -> getBasePath( ) . '/Files/Orders/Bundle_' . $OrderID . '/' ;
		$this -> BillTableData = $this -> renderView( 	$view = 'OrderTripBundle:Bill:BillTable.html.php', 
											$parameters = array( 
												'Bills'			=> $Bills ,
												'TableHelper'	=> $TableHelper ,
												'URL' 			=> $URL ,
												'OrderID'		=> $OrderID 
											)
										);
		$BillForm = $this -> get( 'BillForm' );
		$BillForm -> Is_ForOrder( $this -> generateUrl( 'submit_order_bill' , array( 'OrderID' => $OrderID ) ) );
		$BillForm -> Set_UID( $OrderID );
		
					
		$FormB = $BillForm -> Generate_BillForm( ) ;
		
		return $FormB ;
	}
	
	public function viewAction( $OrderID , $Finalize = '' , Request $Request )
	{
		$OrderID = (int)$OrderID;
		$this -> init( $OrderID ) ;
		
		// Making Order Form 
		$OrdersForm = $this -> get( 'OrdersForm' );
		$OrdersForm -> set_SubmitURL( $this -> generateURL( 'add_order' , array( 'OrderID'	=>	$OrderID ) ) );
		$FormOrder = $OrdersForm -> Generate_OrdersForm( $this -> OrderObj ) ;
		
		$FormB = $this -> Generate_BillTable( $OrderID ) ;
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		$Em =  $this->getDoctrine()->getEntityManager();
		$OrderRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Orders');
		$Orders = $OrderRepository -> findById( $OrderID );
		
		$ProductForm = $this -> get( 'ProductForm' ) ;

		$Form = $ProductForm -> Generate_OrdersForm() ;
		$ProductForm -> SetOrderID( $OrderID ) ;
		$ProductForm -> HandleRequest( $Request , $Orders[0]);
		
		$ProductRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Product');
		$Products = $ProductRepository -> findByOrderid( $OrderID );
		$this -> FinalizeStatus = ( $Orders[0] -> getFinalized( ) ) ? TRUE : FALSE ;
		$TableData = $this -> renderView( 	$view = 'OrderTripBundle:Order:OrderProductTable.html.php', 
											$parameters = array( 
												'Products'		=> $Products ,
												'TableHelper'	=> $TableHelper ,
												'OrderID'		=> $OrderID,
												'Status'		=>$this -> FinalizeStatus 
											)
										);
										
		
		
		$AmountContent = $this 	-> get( 'AmountHelper' ) 
					-> Is_ForOrder( ) 
					-> AddID( $OrderID ) 
					-> GetAmount( ) 
					-> Get_HTMLContent( $Orders[0] -> getProvidedamount( ) );
		
		if ( $Finalize == 'generate' && ! $this -> FinalizeStatus )
		{
			$this -> OrdersPDF_Name = "Orders_NR_" . $OrderID .".pdf" ;
			
			$Orders[0] -> setFinalized( 1 )
					   -> setPdfName( $this -> OrdersPDF_Name );
			
			$this -> HandlePDF( $AmountContent.$TableData , $OrderID );
			$this -> FinalizeStatus = TRUE ;
			$Em -> persist( $Orders[0] );
			$Em -> flush( );
		}
		
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:Order:OrderView.html.php' )
						-> Set_PageTitle( 'Order NR. #'.$OrderID )
						-> Set_TemplateParamter( Array(  
													'OrderID'		=> $OrderID ,
													'Form'			=> $Form -> createView( ) ,
													'FinalizeStatus'=> $this -> FinalizeStatus ,
													'TableData'		=> $TableData ,
													'BillTableData'	=> $this -> BillTableData , 
													'FormBill'		=> $FormB -> createView( ) ,
													'AmountContent'	=> $AmountContent 	,
													'FormOrder'			=> $FormOrder -> createView() 
												) ) 
						-> GenerateTemplate( );
	}
	
	private function HandlePDF( $TableData , $OrderID)
	{
		if ( $this -> FinalizeStatus === TRUE )
			return; 
		try
		{
			$MergeHelper = $this -> get( 'MergeHelper' );
			$MergeHelper -> Set_UniqueID( $OrderID );
			$MergeHelper -> Is_ForOrder( );
			$MergeHelper -> Make_BillAndMainPDF( $TableData . $this -> BillTableData );
			$Result = $MergeHelper -> MergeToPDF( );
		}
		catch ( \Exception $Error )
		{
			Echo $Error -> getMessage( );
		}
		
	}
	
	/**
	 * 
	 */
	
	public function OrderBillAction( $OrderID , Request $Request )
	{
		$this -> init( $OrderID );
		$BillForm = $this -> get( 'BillForm' );
		$BillForm -> Is_ForOrder( $this -> generateUrl( 'submit_order_bill' , array( 'OrderID' => $OrderID ) ) );
		$BillForm -> Set_UID( $OrderID );
		$BillForm -> ProvidedAmount = $this -> OrderObj -> getProvidedamount(  );
		$BillForm -> SpentAmount = $this 	-> get( 'AmountHelper' )  
									-> Is_ForOrder( ) 
									-> AddID( $OrderID ) 
									-> GetAmount( ) -> GetBillAmount( ) ;
		$FormB = $BillForm -> Generate_BillForm( ) ;
		
		$BillForm -> HandleRequest( $Request );
		return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
	}
	
	public function deleteAction( $OrderID )
	{
		$this -> init( $OrderID );
		$this -> Load_UserObject();
		$PathToOrderBundle = $this -> get( 'DIRHelper' ) -> SetUID( $OrderID ) -> Get_PathToOrderBundle( );
		$this -> get( 'BillBundleDelete' ) -> IsForOrder( ) -> setID( $OrderID ) -> DeleteBills( );
		if( file_exists($PathToOrderBundle) )
			system( "rm -rf " . escapeshellarg( $PathToOrderBundle ) );
		$ProvidedAmount = $this -> OrderObj -> getProvidedamount( ) ;
		 $em = $this->getDoctrine()->getEntityManager();
	     $em->remove( $this -> OrderObj );
	     $em->flush();
		 
		$em_user = $this->getDoctrine()->getEntityManager();
		$User = $em_user -> getRepository( 'UserBundle:User' ) -> find( $this -> UserID ) ;
		
		$GlobalOrder = $User -> getGlobalorder( );
		$User -> setGlobalorder( $GlobalOrder + $ProvidedAmount ) ;
		$em_user -> flush();
		 
		return $this -> redirect( $this -> generateUrl( 'order_trip_homepage' ) );
	}
	
	public function deleteProductAction( $ProductID ,$OrderID)
	{
		$this -> init( $OrderID );
	 	$this ->getProduct( $ProductID );
		$em = $this->getDoctrine()->getEntityManager();
		$em->remove( $this -> ProductObj );
        $em->flush();
		 
		return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
	}
	
	/**
	 * 
	 */
	
	public function addAction( $OrderID = null , Request $Request )
	{
		$OrderID= (int) $OrderID ;
		$this -> init( $OrderID );
		$RedirectURL = null ;
		
		$OrdersForm = $this -> get( 'OrdersForm' ) -> set_OrderID( $OrderID ) ;
		$Form = $OrdersForm -> Generate_OrdersForm( ) ;
		
		$OrdersForm -> HandleRequest( $Request ) ;
		
		if ( $OrderID > 0 )
			return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
		
		return $this -> redirect( $this -> generateUrl( 'order_trip_homepage' ) );
	}
	
}

?>