<?php

function d( $array , $cond = 0 )
{
	echo "<pre>";
	print_r( $array );
	echo "<pre>";
	if ( $cond ) exit ;
}

/**
 * Underline Input Function For the Cerere de Ordin
 */

function UI( $String , $Width )
{
	$Width 	= (int)$Width ;
	$String = trim( $String );
	$Width .="px" ;
	$Result = "<input class='cerere-underline-input' style='width: ".$Width.";' value='" . $String . "' />" ;
	return $Result ;
} 
 
?>