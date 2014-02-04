<?php

namespace Diff\BassicLayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BasicLayoutController extends Controller
{
	
	public function WrapperAction( $Content )
	{
		if ( !empty( $Content ) )
			return new response( "Pist" );
		
	}
	
}

?>