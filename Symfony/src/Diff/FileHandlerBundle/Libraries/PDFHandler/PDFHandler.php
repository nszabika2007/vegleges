<?php

namespace Diff\FileHandlerBundle\Libraries\PDFHandler;
use Symfony\Component\HttpFoundation\Request;
use Diff\BassicLayoutBundle\Helper\BasicLayoutHelper AS BasicLayoutHelper ;

Class PDFHandler
{
	
	CONST WEB_FILE_PATH = 'Files/PDF/' ;
	
	private $PDF_FILE_PATH = '';
	
	private $PDF_Name ;
	
	private $Request;
	
	private $PDF_Content ;
	
	private $KnpSnappyPDF ;
	
	private $PDF ;
	
	private $BasicLayoutHelper ;
	
	private $PDF_FilePath ="" ;
	
	function __Construct( $KnpSnappyPDF ,$BasicLayoutHelper )
	{ 	
		$this -> Request = Request :: createFromGlobals();
		
		$this -> BasicLayoutHelper = $BasicLayoutHelper ;
		$this -> KnpSnappyPDF = $KnpSnappyPDF ;
		
		$this -> PDF_FILE_PATH = $this -> Request -> getBasePath( ) . $this :: WEB_FILE_PATH ;
	}
	
	public function Set_PDFName( $PDF_Name )
	{
		$this -> PDF_Name = trim( $PDF_Name );
		
		return $this ;
	}
	
	public function Set_PDFContent( $Content )
	{
		$this -> PDF_Content = $Content;
		
		return $this ;
	}
	
	private function Set_AssetsForContent( )
	{
		$this -> PDF_Content = $this -> BasicLayoutHelper -> Make_PDFRender( $this -> PDF_Content );
	}
	
	/**
	 * 
	 */
	
	public function Set_PDFFilePath( $Path )
	{
		$this -> PDF_FilePath ="Files/".$Path ;
		
		if( !file_exists( $this -> PDF_FilePath ) )
			mkdir( $this -> PDF_FilePath , 0777 , true );
		return $this ;
	}
	
	private function GeneratePDF_File( )
	{
		if( empty( $this -> PDF_FilePath ) )
			$this -> PDF_FilePath = $this :: WEB_FILE_PATH ;
		
		$this -> PDF_FilePath .= $this -> PDF_Name ;
		
		if ( ! file_put_contents( $this -> PDF_FilePath , $this -> PDF ) ); 
			throw new \Exception ( 'Could not put content in File .' );
	}
	
	public function Generate_PDF( )
	{
		$this -> Set_AssetsForContent( );
		$this -> PDF = $this -> KnpSnappyPDF -> getOutputFromHtml(
					$this -> PDF_Content,
                    array(
							'orientation'	=> 'Landscape' ,
							'encoding' => 'utf-8',
							'default-header'=> TRUE
						) );
		try
		{
			$this -> GeneratePDF_File( );
		}
		catch( \Exception  $Error )
		{
			// Echo $Error -> getMessage( );
		}
	}
	
}

?>