<?php

namespace Diff\FileHandlerBundle\Libraries ;

use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadInterface AS UploadInterface;
use Symfony\Component\HttpFoundation\Request AS Request ;
use Diff\FileHandlerBundle\Libraries\PDFHandler\PDFHandler AS PDFHandler ;
use Symfony\Bundle\FrameworkBundle\Templating\DelegatingEngine AS SymfonyTemplating;
use Diff\FileHandlerBundle\Libraries\MergeAPI AS MergeAPI ;

class MergeHelper implements UploadInterface
{
	
	private $ID=0;
	
	private static $Request ;
	
	private static $DIR = "";
	
	private $CondTrip = false ;
	
	private $CondOrder = false ;  
	
	private $MERGED_PDF_NAME ;
	
	private $Images_URL = "";
	
	private $PDFHandler ;
	
	private $SymfonyTemplating ;
	
	private $MergeAPI ;
	
	function __construct( PDFHandler $PDFHandler , SymfonyTemplating $SymfonyTemplating  , MergeAPI $MergeAPI)
	{
		self :: $Request = Request :: createFromGlobals( );
		
		$this -> PDFHandler = $PDFHandler ;
		
		$this -> MergeAPI = $MergeAPI ;
		
		$this -> SymfonyTemplating = $SymfonyTemplating ;
		
		self :: Build_BasePath( ) ;
	}
	
	/**
	 * 	Builds Up the Base Path to Files .
	 */
	
	private static function Build_BasePath( )
	{
		self :: $DIR = self :: $Request -> server -> get( 'DOCUMENT_ROOT' ) . self :: $Request -> getBasePath( ) . self :: BASE_FILE_PATH ;
	}
	
	/**
	 *  @Parameter $ID Integer
	 */
	
	public function Set_UniqueID( $ID )
	{
		$this ->  ID = (int)$ID ;
		
		if ( $this ->  ID < 1 )
			throw new \Exception( "ID Cannot be NULL" );
		
		$this -> MERGED_PDF_NAME.=$this ->  ID ;
	}
	
	/**
	 * 
	 */
	
	public function Is_ForTrips( )
	{
		$this -> CondTrip = true ;
		self :: $DIR .= self :: UPLOAD_TRIP_PATH . self :: FOLDER_BASE_NAME . $this -> ID ;
	}
	
	/**
	 * 
	 */
	
	public function Is_ForOrder( )
	{
		$this -> CondOrder = true ;
		self :: $DIR .= self :: UPLOAD_ORDER_PATH . self :: FOLDER_BASE_NAME . $this -> ID ;
	}
	
	public function Make_BillAndMainPDF( $Content )
	{
		$PDF_Path ="";
		if ( $this -> CondTrip )
			$PDF_Path .= self :: UPLOAD_TRIP_PATH ;
		else if ( $this -> CondOrder )
			$PDF_Path .= self :: UPLOAD_ORDER_PATH ;
		
		$PDF_Path .= self :: FOLDER_BASE_NAME . $this -> ID ."/" ;
		
		$this -> PDFHandler -> Set_PDFName( self :: BILL_AND_MAIN_PDF_PREFIX . $this -> ID .'.pdf' )
							-> Set_PDFContent( $Content )
							-> Set_PDFFilePath( $PDF_Path )
							-> Generate_PDF( ) ;
	}
	
	/**
	 * 
	 */
	
	public function MergeToPDF( )
	{
		$this -> Create_PDFFromImages( );
		
		if ( $this -> CondTrip )
			$this -> MergeAPI -> Is_MergeTypeTrip( );
		else if ( $this -> CondOrder )
			$this -> MergeAPI -> Is_MergeTypeOrder( );
		
		$this -> MergeAPI -> Is_SingleDoc()
				  -> Add_ID( $this -> ID ) ;
		return $this -> MergeAPI -> ExecuteCall( ) ;
	}
	
	/**
	 * 
	 */
	
	private function Create_PDFFromImages( )
	{
		if ( ! file_exists( self :: $DIR ) )
			throw new \Exception( "Directory does not exist!" );
		
		$DIR_Files = array_diff( scandir( self :: $DIR ) , array( '..' , '.' ) );
		
		$this -> Build_URLForImages();
		
		$Image_Array = array();
		
		foreach( $DIR_Files AS $num => $File )
		{
			$File_Array = explode('.', $File);
			$image_type = strtolower( $File_Array[1] ) ;
			if( ! in_array( $image_type , array( 'gif' , 'jpg' ,'png' ,'jpeg' , 'bmp' ) ) )
			 	continue ;
			       
			$Image_Array[] = $this -> Images_URL . $File ;   
		}
		
		$Content = $this -> SymfonyTemplating -> render( 
										'FileHandlerBundle:Merge:Merge_Img.html.php' ,
										array(
											'ImgArray'		=> $Image_Array
										)
								); 
		$PDF_Path ="";
		if ( $this -> CondTrip )
			$PDF_Path .= self :: UPLOAD_TRIP_PATH ;
		else if ( $this -> CondOrder )
			$PDF_Path .= self :: UPLOAD_ORDER_PATH ;
		
		$PDF_Path .= self :: FOLDER_BASE_NAME . $this -> ID ."/" ;
								
		$this -> PDFHandler -> Set_PDFName( self :: MERGED_IMAGE_PDF_PREFIX . $this -> ID .'.pdf' )
							-> Set_PDFContent( $Content )
							-> Set_PDFFilePath( $PDF_Path )
							-> Generate_PDF( )
		;						
	}
	
	/**
	 * 
	 */
	
	private function Build_URLForImages( )
	{
		$this -> Images_URL = 'http://' .self :: $Request -> getHttpHost( ) . self :: $Request -> getBasePath( ) . self :: BASE_FILE_PATH;
		if ( $this -> CondTrip )
			$this -> Images_URL .= self :: UPLOAD_TRIP_PATH ;
		else if ( $this -> CondOrder )
			$this -> Images_URL .= self :: UPLOAD_ORDER_PATH ;
		
		$this -> Images_URL .= self :: FOLDER_BASE_NAME . $this -> ID . "/" ;
	}
	
}

?>