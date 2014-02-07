<?php

namespace Diff\OrderTripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderTripUserStatsController extends Controller
{
	
	private $EntityManeger ;
	private $UsersArray = Array( ) ; 
	
	private function init( )
	{
		$this -> EntityManeger = $this -> getDoctrine( ) -> getEntityManager( ) ;
		
		$Query = $this -> EntityManeger -> createQuery
		(
			"SELECT u 
			FROM UserBundle:User u 
			ORDER BY u.role , u.id"
		);
		$this -> UsersArray = $Query -> getResult( );
	}
	
	/**
	 * 
	 */
	
	public function tripAction( )
	{
		$this -> init( );
		$QueryTrip = Null ;
		
		$BillAmount = Null;
		$ProvidedAmountTrip = Null;
		
		$TotalProvidedAmount = NULL ;
		$TotalBilledAmount = NULL ;
		$AmountHelper = $this -> get( 'AmountHelper' )
							  -> Is_ForTrip( ) ;
							  
		foreach( $this -> UsersArray AS $num => $User )
		{
			$QueryTrip = $this -> EntityManeger -> createQuery(
				"SELECT t
				FROM OrderTripBundle:Trips t 
				WHERE t.userid= :user_id
				"
			) -> setParameter( 'user_id' , $User -> getId() );
			$TripResult = $QueryTrip -> getResult( );
			
			foreach( $TripResult AS $NumTrip => $Trip )
			{
				$BillAmount += $AmountHelper 	-> AddID( $Trip -> getId( ) )
												-> GetAmount( )
												-> GetBillAmount( ) ;
				$ProvidedAmountTrip += $Trip -> getProvidedamount( );								
			}
			$this -> UsersArray[ $num ] -> ProvidedAmount = $ProvidedAmountTrip ;
			$this -> UsersArray[ $num ] -> BillAmount = $BillAmount ;
			$TotalProvidedAmount += $ProvidedAmountTrip ;
			$TotalBilledAmount += $BillAmount ;
			$ProvidedAmountTrip = Null ;
			$BillAmount = Null ;
		}
		
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:UserStats:MainTrip.html.php' )
						-> Set_PageTitle( 'Users Trips Stats' )
						-> Set_TemplateParamter( Array(
													'UserStats' 	=> $this -> UsersArray ,
													'TableHelper'	=> $TableHelper ,
													'GlobalAmount'	=> $this -> get( 'GlobalHelper' ) -> ReturnTrip( ) ,
													'TotalProvidedAmount' 	=> $TotalProvidedAmount,
													'TotalBilledAmount'	  	=> $TotalBilledAmount
												) ) 
						-> GenerateTemplate( );
	}
	
	/**
	 * 
	 */
	
	public function orderAction( )
	{
		$this -> init( ); 
		
		$QueryOrder = Null ;
		
		$BillAmount = Null;
		$ProvidedAmountOrder = Null;
		
		$TotalProvidedAmount = NULL ;
		$TotalBilledAmount = NULL ;
		$AmountHelper = $this -> get( 'AmountHelper' ) 
							  -> Is_ForOrder( ) ;
		
		foreach( $this -> UsersArray AS $num => $User )
		{
			$QueryOrder = $this -> EntityManeger -> createQuery(
				"SELECT o
				FROM OrderTripBundle:Orders o 
				WHERE o.userid= :user_id
				"
			) -> setParameter( 'user_id' , $User -> getId() );
			$OrderResult = $QueryOrder -> getResult( );
			
			foreach( $OrderResult AS $NumOrder => $Order )
			{
				$BillAmount += $AmountHelper 	-> AddID( $Order -> getId( ) )
												-> GetAmount( )
												-> GetBillAmount( ) ;
				$ProvidedAmountOrder += $Order -> getProvidedamount( );								
			}
			$this -> UsersArray[ $num ] -> ProvidedAmount = $ProvidedAmountOrder ;
			$this -> UsersArray[ $num ] -> BillAmount = $BillAmount ;
			$TotalProvidedAmount += $ProvidedAmountOrder ;
			$TotalBilledAmount += $BillAmount ;
			$ProvidedAmountOrder = Null ;
			$BillAmount = Null ;
		}
		
		$TableHelper = $this -> get( 'CITableHelper' ) ;
		
		return   
				$this	-> get( 'BasicLayoutHelper' ) 
						-> Set_TemplatePath( 'OrderTripBundle:UserStats:MainOrder.html.php' )
						-> Set_PageTitle( 'Users Order Stats' )
						-> Set_TemplateParamter( Array(
													'UserStats' 	=> $this -> UsersArray ,
													'TableHelper'	=> $TableHelper ,
													'GlobalAmount'	=> $this -> get( 'GlobalHelper' ) -> ReturnOrder( ) ,
													'TotalProvidedAmount' 	=> $TotalProvidedAmount,
													'TotalBilledAmount'	  	=> $TotalBilledAmount
												) ) 
						-> GenerateTemplate( );
	}
	
}

?>