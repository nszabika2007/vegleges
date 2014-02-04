<?php

if ( !isset( $_POST[ 'inf' ] ) or empty( $_POST[ 'inf' ] ) )
	die( "0" ) ;

$JsonOBJ = json_decode( base64_decode( trim( $_POST[ 'inf' ] ) ) );

if ( $JsonOBJ -> secret != "BRehA4ubAfej6Swe" )
	die( "0" );

$BasePath = "Symfony/web/Files/";
if( $JsonOBJ -> type =='TRIP' )
{
	$BasePath.="Trips/"	;
} 
else if ( $JsonOBJ -> type =='ORDER' )
{
	$BasePath.="Orders/" ;
}

include 'PDFMerger/PDFMerger.php';

$PDFMerger = new PDFMerger;
$PathFile = "";
if ( (int)$JsonOBJ -> single_doc )
{
	$BasePath .="Bundle_" . $JsonOBJ ->ids[0] ."/";
	
	$DIR_Files = array_diff( scandir( $BasePath ) , array( '..' , '.' ) ) ;
	
	foreach( $DIR_Files AS $num => $File )
	{
		$FileArray = explode( '.' , $File ) ;
		$FileType = $FileArray[1];
		if ( !in_array( $FileType , array( 'pdf' ) ) )
			continue ;
		
		$PDFMerger -> addPDF( $BasePath . $File , 'all' );
	}
	$PathFile = $BasePath . "PDF_MERGED.pdf" ;
}
else 
{	
	foreach( $JsonOBJ -> ids AS $num => $ID )
	{
		$File = $BasePath."Bundle_".$ID."/PDF_MERGED.pdf" ;
		if ( file_exists($File) )
			$PDFMerger -> addPDF( $File , 'all' );
	}
	$PathFile = $BasePath . "Stats/PDF_STATS_MERGED_" .$JsonOBJ ->user_id. ".pdf" ;
}


try 
{
	$PDFMerger -> merge( 'file' , $PathFile);
} 
catch( Exception $Error )
{
	Echo "<b>There was a problem with one of the PDFs while trying to merge : </b>".$Error -> getMessage( );
}	
	//REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
	//You do not need to give a file path for browser, string, or download - just the name.
?>