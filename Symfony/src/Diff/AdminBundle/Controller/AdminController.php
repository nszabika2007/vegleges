<?php

namespace Diff\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext; 
use Diff\AdminBundle\Entity\Admin;
use Diff\AdminBundle\Form\AdminForm;

class AdminController extends Controller
{
	
	Private $UserObject ;
	
	private function init()
	{
		$this -> UserObject = $this -> get( 'UserHelper' ) -> Get_CurrentUser();
		
		$this -> UserID = $this -> UserObject -> getId();
	}
	
	public function indexAction( Request $Request )
    {
		$this -> init( );
		
		$UsersRepository = $this -> getDoctrine() -> getRepository('AdminBundle:Admin');
		
		$UsersForm = $this -> get( 'AdminForm' );
		$Form = $UsersForm -> Generate_AdminForm() ;
		
		
		$UsersForm -> HandleRequest( $Request );
		$users = $this->getDoctrine()->getRepository("AdminBundle:Admin")->findAll();
		
		$Content = $this -> HandleGlobal( ) ;
		
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'AdminBundle:Admin:index.html.php' )
						-> Set_PageTitle( 'Admin' )
						-> Set_TemplateParamter(Array(	
														'Form' => $Form -> createView(),
														'users' => $users ,
														'GlobalsContent' => $Content
														)) 
						-> GenerateTemplate( );
    }	
	
	private function HandleGlobal( )
	{
		$this -> init( );
		
		$GlobalHelper = $this -> get( 'GlobalHelper' );
		$URL = $this -> generateUrl( 'admin_global_submit' );
		$Content = $this -> renderView( 'AdminBundle:Admin:global.html.php',
									array(
										'GlobalTrip' => $GlobalHelper -> ReturnTrip( ) ,
										'GlobalOrder'=> $GlobalHelper -> ReturnOrder( ) ,
										'URL' 		=> $URL
									)
		 );
		return $Content ;
	}
	
	public function submitAction( Request $Request )
	{
		$this -> init( );
		$GlobalTrip =  $Request -> request -> get( 'GlobalTrip' );
		$GlobalOrder = $Request -> request -> get( 'GlobalOrder' );
		
		$em = $this -> getDoctrine( ) -> getManager( ) ;
		$Globals = $em -> getRepository( 'OrderTripBundle:Globals' ) -> find( 1 ) ;
		$Globals -> setGlobaltrip( $GlobalTrip ) ;
		$Globals -> setGlobalorder( $GlobalOrder ) ;
		
		$em -> flush( );
		
		return $this -> redirect( $this -> generateUrl( 'admin_homepage' ) ) ;
	}
	
}

