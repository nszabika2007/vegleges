<?php

namespace Diff\UserBundle\Controller;

use Diff\UserBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
	private $UserObj;

	
	public function init()
	{
		$this -> UserObj = $this -> get("UserHelper") -> Get_CurrentUser();
	}
	
    public function indexAction( )
    {
		$this -> init();
        return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'UserBundle:User:index.html.php' )
						-> Set_PageTitle( 'User' )
						-> Set_TemplateParamter( Array(
									'UserObj' => $this->UserObj
						 ) ) 
						-> GenerateTemplate( );
    }
	
	public function editAction(Request $Request)
	{
		
		$this -> init( );
		
		$UserID = $this -> UserObj -> getId();
		
		if( $Request -> getMethod() ==="POST" )
		{
			$firstname = $Request -> request ->get('firstname');
			$lastname= $Request -> request ->get('lastname');
			$email = $Request -> request ->get('email');
			$tel = $Request -> request ->get('tel');
			$university = $Request -> request ->get('university');
			
			$em = $this -> getDoctrine( ) -> getManager( ) ;
			$User = $em -> getRepository( 'UserBundle:User' ) -> find( $UserID ) ;
			$User -> setFirstname( $firstname) ;
			$User -> setLastname( $lastname ) ;
			$User -> setEmail( $email) ;
			$User -> setTel( $tel ) ; 
			$User -> setUniversity( $university) ;
			$em -> flush( );
		}
		
		return $this -> redirect( $this -> generateUrl( 'user_homepage' ) ) ;
	}
	
	public function editpasswordAction(Request $Request)
	{
		
		$this -> init( );
		$UserID = $this -> UserObj -> getId();
		if( $Request -> getMethod() ==="POST" )
		{
			$em = $this -> getDoctrine( ) -> getManager( ) ;
			$User = $em -> getRepository( 'UserBundle:User' ) -> find( $UserID ) ;
			$opass2 = $User -> getPassword() ;
			$opass = $Request -> request ->get('opass');
			$npass= $Request -> request ->get('npass');
			$cpass = $Request -> request ->get('cpass');
			if($opass2 === $opass)
			{
				
				if($npass == $cpass)
				{
					
					$User -> setPassword($npass) ;
					$em -> flush( );
				}
				else
				{
					$this -> get('SessionHelper') -> set_ErrorFlashData('The two password do not match!');
				}
			}
			else
			{
				$this -> get('SessionHelper') -> set_ErrorFlashData('Incorrect old password!');
			}
		}
		return $this -> redirect( $this -> generateUrl( 'user_homepage' ) ) ;
	}
}
