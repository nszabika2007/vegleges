<?php

namespace Diff\FileHandlerBundle\Libraries ;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;

Class MergeAPI
{

	private static $Request ;
	
	private static $API_BaseURL = "";
	
	private $CH ;
	
	private $MergeType = "";
	
	private $IsSingleDoc = 0;
	
	private $IDS = array();
	
	private $UserHelper ;
	
	private $TripUploadFinalize = false ;
	
	private $Invitation = "" ;
	
	function __construct( UserHelper $UserHelper )
	{
		
		$this -> CH = curl_init( );
		
		self :: $Request = Request :: createFromGlobals( );
		
		$this -> UserHelper = $UserHelper ;
				
		self :: Build_APIBaseURL( ) ;
	}
	
	private static function Build_APIBaseURL( )
	{
		self :: $API_BaseURL = "http://" . self :: $Request -> getHttpHost( ) . self :: $Request -> getBasePath( )  . "/MargeIndex.php" ;
	}
	
	public function Set_TripUploadFinalize( $Invitation )
	{
		$this -> Invitation = trim( $Invitation );
		
		$this -> TripUploadFinalize = TRUE ;
		
		return $this ;
	}
	
	public function Is_MergeTypeTrip( )
	{
		$this -> MergeType = "TRIP" ;
		
		return $this ;
	}
	
	public function Is_MergeTypeOrder( )
	{
		$this -> MergeType = "ORDER" ;
		
		return $this ;
	}
	
	/**
	 * 
	 */
	
	public function Is_SingleDoc( )
	{
		$this -> IsSingleDoc = 1 ;
		
		return $this ;
	}
	
	public function Add_ID( $ID )
	{
		$this -> IDS[] = (int)$ID ;
	}
	
	private function Build_SubmitJSON( )
	{
		$Json_Array = Array() ;
		$Json_Array[ 'secret' ] = "BRehA4ubAfej6Swe" ; 
		$Json_Array[ 'type' ] = $this -> MergeType ;
		$Json_Array[ 'ids' ] = $this -> IDS ;
		$Json_Array[ 'single_doc' ] = $this -> IsSingleDoc ;
		$Json_Array[ 'user_id' ] = $this -> UserHelper -> Get_UserID( ) ;
		
		if ( $this -> TripUploadFinalize === TRUE )
		{
			$Json_Array[ 'TripUploadFinalize' ] = '1';
			$Json_Array[ 'Invitation' ] = $this -> Invitation ;
		}
		
		return base64_encode( json_encode( $Json_Array ) ) ;
	}
	
	/**
	 * 
	 */
	
	public function ExecuteCall( )
	{
		$Post = Array( ) ;	
		curl_setopt( $this -> CH , CURLOPT_URL , self :: $API_BaseURL ) ;
		$Post[ 'inf' ] = $this -> Build_SubmitJSON( ) ;
		
		curl_setopt( $this -> CH , CURLOPT_POST , 1 ) ;
		curl_setopt( $this -> CH , CURLOPT_POSTFIELDS , $Post ) ;
		curl_setopt( $this -> CH , CURLOPT_RETURNTRANSFER , 1) ;
		
		$Result =  curl_exec( $this -> CH ) ;
		
		curl_close( $this -> CH ) ;
		
		return $Result ;
	}
	
}

?>