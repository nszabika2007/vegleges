<?php

namespace Diff\FileHandlerBundle\Libraries ;

use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadInterface AS UploadInterface;
use Symfony\Component\HttpFoundation\Request AS Request;

Class DIRHelper implements UploadInterface 
{

	private static $Request ;
	
	private static $BasePath_ToFiles="" ;
	
	private $UID = 0;
	
	function __construct( )
	{
		self :: $Request = Request :: createFromGlobals( );
		
		self :: $BasePath_ToFiles = self :: $Request -> server -> get( 'DOCUMENT_ROOT' ) . 
						self :: $Request -> getBasePath( ) . self :: BASE_FILE_PATH ;
										
	}
	
	public function SetUID( $UID )
	{
		$this -> UID = (int) $UID ;
		
		return $this ;
	}
	
	public function Get_PathToOrder( )
	{
		return self :: $BasePath_ToFiles . self :: UPLOAD_ORDER_PATH ;
	}
	
	public function Get_PathToTrip( )
	{
		return self :: $BasePath_ToFiles . self :: UPLOAD_TRIP_PATH ;
	}
	
	public function Get_PathToOrderBundle( )
	{
		return self :: $BasePath_ToFiles . self :: UPLOAD_ORDER_PATH . self :: FOLDER_BASE_NAME . $this -> UID . "/";
	}
	
	public function Get_PathToTripBundle( )
	{
		return self :: $BasePath_ToFiles . self :: UPLOAD_TRIP_PATH . self :: FOLDER_BASE_NAME . $this -> UID . "/";
	}
	
	public function Get_URLPathForTrip( )
	{
		return 'http://' .self :: $Request ->getHttpHost() . self :: $Request -> getBasePath( ) . self :: BASE_FILE_PATH 
		.self :: UPLOAD_TRIP_PATH . self :: FOLDER_BASE_NAME . $this -> UID . "/" 
		;
	}
	
}


?>