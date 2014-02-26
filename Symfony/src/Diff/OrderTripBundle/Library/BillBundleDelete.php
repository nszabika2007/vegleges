<?php

namespace Diff\OrderTripBundle\Library;	

use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;

Class BillBundleDelete
{
	
	private $EntityManager ;
	
	private $UserHelper ;
	
	private $UserOBJ ;
	
	private $CondTrip = false; 
	
	private $CondOrder = false; 
	
	private $ID = 0;
	
	private $Bills ; 
	
	private $BillEntity ;
	
	private $Global ;
	 
	function __construct( UserHelper $UserHelper , EntityManager $EntityManager )
	{
		$this -> EntityManager = $EntityManager ;
		
		$this -> UserHelper = $UserHelper ;
		
		$this -> BillEntity = $EntityManager;
		
		$this -> UserOBJ = $this -> EntityManager -> getRepository( 'UserBundle:User' ) 
				-> find( $this -> UserHelper -> Get_CurrentUser( ) -> getId( ) ) ;
				
	}
	
	public function IsForTrip(  )
	{
		$this -> CondTrip = True ;
		
		return $this ;
	}
	
	public function IsForOrder( )
	{
		$this -> CondOrder = True ;
		
		return $this ;
	}
	
	public function setID( $ID )
	{
		$this -> ID = (int) $ID ;
		
		return $this ;
	}
	
	public function DeleteBills( )
	{
		if ( $this -> CondTrip === TRUE )
			$this -> HandleForTrip( ) ;
		else if( $this -> CondOrder === TRUE )
			$this -> HandleForOrder( ) ;
		// $BillSum = Null ;
		
		// foreach( $this -> Bills AS $num => $Bill )
		// {
			// $BillSum+= $Bill -> getAmount( ) ;
// 			
		// }
		// $this -> Global += $BillSum ;
// 		
		// if ( $this -> CondTrip === TRUE )
			// $this -> UserOBJ -> setGlobaltrip( $this -> Global ) ;
		// else if( $this -> CondOrder === TRUE )
			// $this -> UserOBJ -> setGlobalorder( $this -> Global ) ; 
// 		
		// $this -> EntityManager -> flush( );
		
		foreach( $this -> Bills AS $num => $Bill )
		{
			$this -> BillEntity -> remove( $Bill );
			$this -> BillEntity -> flush( ) ;
		}
	}
	
	private function HandleForTrip( )
	{
		$Query = $this -> BillEntity ->createQuery(
		    "SELECT b
		    FROM BassicLayoutBundle:Bills b
		    WHERE b.tripId= :trip" 
		) 
		  -> setParameter( 'trip' , $this -> ID ) ;
		$this -> Bills = $Query -> getResult( ) ;
		$this -> Global = $this -> UserOBJ -> getGlobaltrip( ) ;  
	} 
	
	private function HandleForOrder( )
	{
		$Query = $this -> BillEntity ->createQuery(
		    "SELECT b
		    FROM BassicLayoutBundle:Bills b
		    WHERE b.orderId= :order" 
		) 
		  -> setParameter( 'order' , $this -> ID ) ;
		$this -> Bills = $Query -> getResult( ) ;
		$this -> Global = $this -> UserOBJ -> getGlobalorder( ) ;  
	}
	
}

?>