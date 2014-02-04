<?php

namespace Diff\UserBundle\Controller;

use Diff\UserBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Controller\ControllerReference;

class UserController extends Controller
{
    public function indexAction( )
    {
	
        return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'UserBundle:User:index.html.php' )
						-> Set_PageTitle( 'User' )
						-> Set_TemplateParamter( Array( ) ) 
						-> GenerateTemplate( );
    }
}
