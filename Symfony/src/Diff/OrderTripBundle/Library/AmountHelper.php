<?php

namespace Diff\OrderTripBundle\Library;	

use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\BassicLayoutBundle\Entity\Bills AS Bills ;
use Symfony\Bundle\FrameworkBundle\Templating\DelegatingEngine AS SymfonyTemplating;

class AmountHelper
{
	
	private $EntityManager ;
	private $SymfonyTemplating ;
	
	private $CondTrip = false;
	private $CondOrder = false;
	private $ID = 0;
	
	private $BillAmount = 0 ;
	
	function __construct( EntityManager $EntityManager , SymfonyTemplating $SymfonyTemplating )
	{
		$this -> EntityManager = $EntityManager ;
		
		$this -> SymfonyTemplating = $SymfonyTemplating ;
	}
	
	public function Is_ForTrip(  )
	{
		$this -> CondTrip = true ;
		return $this ;
	}
	
	public function Is_ForOrder( )
	{
		$this -> CondOrder = true ;
		return $this ;
	}
	
	public function AddID( $ID )
	{
		$this -> ID = ( int ) $ID;
		return $this ;
	}
	
	public function GetAmount( )
	{
		
		if ( $this -> CondTrip )
			 $this -> HandleForTrip( ) ;
		else if ( $this -> CondOrder )
			 $this -> HandleForOrder( ) ;
		
		return $this ;
	}
	
	public function GetBillAmount( )
	{
		return $this -> BillAmount ;
	}
	
	private function HandleForTrip( )
	{
		$Query = $this -> EntityManager ->createQuery(
		    "SELECT SUM(b.amount)
		    FROM BassicLayoutBundle:Bills b
		    WHERE b.tripId= :trip" 
		) 
		  -> setParameter( 'trip' , $this -> ID ) 
          -> getSingleScalarResult( ) ;
		  $this -> BillAmount = number_format ( $Query , 2 ) ;
	}
	
	private function HandleForOrder( )
	{
		$Query = $this -> EntityManager ->createQuery(
		    "SELECT SUM(b.amount)
		    FROM BassicLayoutBundle:Bills b
		    WHERE b.orderId= :order" 
		) 
		  -> setParameter( 'order' , $this -> ID ) 
          -> getSingleScalarResult( ) ;
		  $this -> BillAmount = number_format ( $Query , 2 ) ;
	}
	
	public function Get_HTMLContent( $ProvidedAmount )
	{
		$Content = $this -> SymfonyTemplating -> render( 
								'OrderTripBundle:Bill:BillAmount.html.php' ,
								array( 
										'CondTrip' 			=> $this -> CondTrip ,
										'CondOrder'			=> $this -> CondOrder ,
										'ID'				=> $this ->ID ,
										'BillAmount' 		=> $this -> BillAmount ,
										'ProvidedAmount'	=> $ProvidedAmount
								 )
							 ) ;
							 
		return $Content ;					 
	}
	
}

?>