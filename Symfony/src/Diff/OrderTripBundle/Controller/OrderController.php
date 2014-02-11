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
		$OrderRepository = $this -> getDoctrine() -> getRepository('OrderTripBundle:Orders');
		$Orders = $OrderRepository -> findById( $OrderID );
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
		
		$OrdersForm -> HandleRequest( $Request );
		
		$Orders = $OrderRepository -> findByUserid( $this -> UserID ,  array('id' => 'DESC'));
		
		$StatsForm = $this ->get( 'StatsForm' );
		$SForm = $StatsForm -> Is_ForOrder( )
							-> Generate_Form( ) ;
		
		$SumBills = 0;								
		$AmountHelper = $this 	-> get( 'AmountHelper' )
								-> Is_ForOrder();
		foreach( $Orders AS $num => $Order )
		{
			$SumBills+= $AmountHelper 	-> AddID( $Order -> getId() )
										-> GetAmount( )
										-> GetBillAmount( );
		}
		//$this-> get( "session" )->getFlashBag()->add('notice', 'Profile updated');		
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
													'AmountContent'	=> $AmountContent 	
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
		$BillForm = $this -> get( 'BillForm' );
		$BillForm -> Is_ForOrder( $this -> generateUrl( 'submit_order_bill' , array( 'OrderID' => $OrderID ) ) );
		$BillForm -> Set_UID( $OrderID );
		$FormB = $BillForm -> Generate_BillForm( ) ;
		
		$BillForm -> HandleRequest( $Request );
		return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
	}
	
	public function deleteAction( $OrderID )
	{
		$this -> init( $OrderID );
		$PathToOrderBundle = $this -> get( 'DIRHelper' ) -> SetUID( $OrderID ) -> Get_PathToOrderBundle( );

		if( file_exists($PathToOrderBundle) )
			system( "rm -rf " . escapeshellarg( $PathToOrderBundle ) );
		
		 $em = $this->getDoctrine()->getEntityManager();
	     $em->remove( $this -> OrderObj );
	     $em->flush();
		 
		return $this -> redirect( $this -> generateUrl( 'order_trip_homepage' ) );
	}
	
	public function deleteProductAction( $ProductID ,$OrderID)
	{
	 	$this ->getProduct( $ProductID );
		$em = $this->getDoctrine()->getEntityManager();
		$em->remove( $this -> ProductObj );
        $em->flush();
		 
		return $this -> redirect( $this -> generateUrl( 'view_order' , array( 'OrderID' => $OrderID ) ) );
	}
	
}

?>