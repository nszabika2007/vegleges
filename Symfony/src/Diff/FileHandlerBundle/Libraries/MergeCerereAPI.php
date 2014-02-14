<?php

namespace Diff\FileHandlerBundle\Libraries;

Class MergeCerereAPI
{
	
	private $UserID = 0;
	
	function __construct( )
	{
		
	}
	
	public function set_UserID( $UserID )
	{
		$this -> UserID = ( int ) $UserID ;
	}
	
}

?>