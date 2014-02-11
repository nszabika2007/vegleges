<?php

namespace Diff\OrderTripBundle\Library ;

use Diff\UserBundle\Helper\UserHelper AS UserHelper ;

Class GlobalHelper
{
	
	private $User ;
	
	function __construct( UserHelper $UserHelper )
	{
		$this -> User = $UserHelper -> Get_CurrentUser( ) ;	 
	}
	
	public function ReturnOrder()
	{
		return $this -> User -> getGlobalorder( );
	}
	
	public function ReturnTrip()
	{
		return $this -> User -> getGlobaltrip( );
	}
	
}

?>