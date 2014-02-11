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
		
		$UsersForm = $this -> get( 'AdminForm' );
		$Form = $UsersForm -> Generate_AdminForm() ;
		
		
		$UsersForm -> HandleRequest( $Request );
		$users = $this->getDoctrine()->getRepository("UserBundle:User")->findAll();
		
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'AdminBundle:Admin:index.html.php' )
						-> Set_PageTitle( 'Admin' )
						-> Set_TemplateParamter(Array(	
														'Form' => $Form -> createView(),
														'users' => $users 
														)) 
						-> GenerateTemplate( );
    }	
	
	public function submitAction( $UserID , Request $Request )
	{
		$this -> init( );
		
		$GlobalTrip =  $Request -> request -> get( 'GlobalTrip' );
		$GlobalOrder = $Request -> request -> get( 'GlobalOrder' );
		
		$em = $this -> getDoctrine( ) -> getManager( ) ;
		$User = $em -> getRepository( 'UserBundle:User' ) -> find( $UserID ) ;
		$User -> setGlobaltrip( $GlobalTrip ) ;
		$User -> setGlobalorder( $GlobalOrder ) ; 
		
		$em -> flush( );
		
		return $this -> redirect( $this -> generateUrl( 'admin_homepage' ) ) ;
	}
	
}

