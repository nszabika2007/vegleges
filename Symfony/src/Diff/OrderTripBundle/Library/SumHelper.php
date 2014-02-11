<?php
namespace Diff\OrderTripBundle\Library;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Library\AmountHelper AS AmountHelper ;

Class SumHelper
{
	
	Private $UserHelper ;
	
	private $EntityManager ;
	
	private $AmountHelper ;
	
	private $CondTrip = false ;
	
	private $CondOrder = false ; 
	
	private $UserID = 0 ;
	
	private $Total =0;
	
	private $TotalBilled = 0;
	
	function __construct( UserHelper $UserHelper , EntityManager $EntityManager , AmountHelper $AmountHelper )
	{
		$this -> UserHelper = $UserHelper ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> AmountHelper = $AmountHelper -> Is_ForTrip( );
		
		$this -> UserID = $this -> UserHelper -> Get_UserID() ;
	}
	
	public function IsForTrip( )
	{
		$this -> CondTrip = true ;
		
		return $this ;
	}
	
	public function IsForOrder( )
	{
		$this -> CondOrder = TRUE ;
		
		return $this ; 
	}
	
	public function Load_Totals()
	{
		$this -> Total = 0;
		$this -> TotalBilled = 0 ;
		if ( $this -> CondTrip === TRUE )
			$this -> MakeCalcForTrip( );
		else if ( $this -> CondOrder === TRUE )
			$this -> MakeCalcForOrder( );
		return $this ; 
	}
	
	private function MakeCalcForTrip( )
	{
		$QueryTrip = $this -> EntityManager -> createQuery(
				"SELECT t
				FROM OrderTripBundle:Trips t 
				WHERE t.userid= :user_id
				"
			) -> setParameter( 'user_id' , $this -> UserID );
			
		$TripResult = $QueryTrip -> getResult( );
		foreach( $TripResult AS $Num => $Trip )
		{
			$this -> Total += $Trip -> getProvidedamount( ) ;
			$this -> TotalBilled += $this -> AmountHelper 	-> AddID( $Trip -> getId( ) )
															-> GetAmount( )
															-> GetBillAmount( ) ;
		}
	}
	
	private function MakeCalcForOrder( )
	{
		
	}
	
	public function get_Total( )
	{
		return $this -> Total ;
	}
	
	public function get_TotalBilled( )
	{
		return $this -> TotalBilled ;
	}
	
	
	
}

?>