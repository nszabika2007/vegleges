<?php

namespace Diff\OrderTripBundle\Library ;

use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Globals AS Globals ;

Class GlobalHelper
{
	
	private  $EntityManager ;
	
	private $Globals ;
	private $GlobalRepository ;
	
	function __construct( EntityManager $EntityManager )
	{
		$this -> EntityManager = $EntityManager ;
		$this -> GlobalRepository = $this -> EntityManager -> getRepository( 'OrderTripBundle:Globals' );
		$this -> Globals  = $this -> GlobalRepository -> findById( 1 );
		$this -> Globals = $this -> Globals[0] ;	 
	}
	
	public function ReturnOrder()
	{
		return $this -> Globals -> getGlobalorder( );
	}
	
	public function ReturnTrip()
	{
		return $this -> Globals -> getGlobaltrip( );
	}
	
}

?>