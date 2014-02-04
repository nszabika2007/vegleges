<?php

namespace Diff\FileHandlerBundle\Libraries\UploadHelper;

use Symfony\Component\HttpFoundation\Request AS Request;
use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadInterface AS UploadInterface;
use Diff\BassicLayoutBundle\Entity\Files AS Files;

Abstract Class UploadFile implements UploadInterface
{
	
	protected static $Request ;
	
	protected static $BASE_PATH ;
	
	protected $FULL_PATH ;
	
	protected $ID;
	
	protected $DIR ;
	
	protected static $UploadedFile_Array = Array( ) ;
	
	protected static $EntityManager;
	
	function __construct( )
	{
		
	}
	
	/**
	 * 
	 */
	
	protected abstract function Build_FullPath( ) ;
	
	/**
	 * 
	 */
	
	protected abstract function Chose_RightFiled( Files $Files );
	
	/**
	 * 	@Parameter $Request Type Request
	 */
	
	public static function Set_RequestObject( Request $Request )
	{
		self :: $Request = $Request ;
		
		if( self :: $Request -> getMethod() != 'POST' )
			throw new \Exception( 'HTTP method must be POST.' );
				
		self :: $UploadedFile_Array = self :: $Request -> files -> all( );
				
		if( empty( self :: $UploadedFile_Array ) )		
			throw new \Exception( 'No Files Were Selected .' );
			
		self :: Build_BasePath( ) ;
	}
	
	/**
	 * 
	 */
	
	public static function Set_EntityManager( $Em )
	{
		self :: $EntityManager = $Em ;
	}
	
	private static function Build_BasePath( )
	{
		self :: $BASE_PATH = self :: $Request -> getBasePath( ) . self :: BASE_FILE_PATH ;
	}
	
	
	/**
	 * 	@Parameter $ID Type = Integer .
	 */
	
	public function Set_UniqueID( $ID )
	{
		$this -> ID = (int) $ID ;
		
		if ( $this -> ID < 1 )
			throw new \Exception( 'The Unique ID cannot be NULL .' ) ; 
		
		$this -> Build_FullPath( ) ;
		
		$this -> Make_UniqueDIR( ) ;
	}
	
	/**
	 * 	Makes The DIR depending on the Unique ID .
	 */
	
	private function Make_UniqueDIR( )
	{
		$this -> DIR =  self :: $Request -> server -> get( 'DOCUMENT_ROOT' ) . $this -> FULL_PATH . self :: FOLDER_BASE_NAME . $this -> ID;
		if ( !file_exists( $this -> DIR ) )
			mkdir( $this -> DIR , 0777 , true ) ;
	}
	
	/**
	 * 
	 */
	
	public function Process( )
	{		
		foreach( self :: $UploadedFile_Array AS $num => $File )
		{
			$Files = new Files();
			$Files = $this -> Chose_RightFiled( $Files );
			$Files -> setDesription( self :: $Request -> request -> get( 'description' ) )
				   -> setFileName( $File -> getClientOriginalName( ) );
			self :: $EntityManager -> persist( $Files );		
			self :: $EntityManager -> flush( );	
			$File -> move( $this -> DIR , $File -> getClientOriginalName( ) );
		}
	}
		
}
	
?>