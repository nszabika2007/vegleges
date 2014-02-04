<?php

namespace Diff\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Diff\UserBundle\Entity;

class LoginController extends Controller
{
	 
    public function loginAction(Request $request)
    {
		
        $request = $this->getRequest();
        $session = $request->getSession();
		$securityContext = $this->container->get('security.context');
		
		
		
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
		
        return $this->render('LoginBundle:Login:login.html.php', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
			'Title'			=> 'Login',
        ));
    }

	public function logoutAction(  )
	{
		
		$this->get('security.context')->setToken(null);
		$this->get('request')->getSession()->invalidate();
		return $this -> redirect( $this -> generateURL( 'user_homepage' ) );
	}

}
