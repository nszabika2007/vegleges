<?php

namespace Diff\OrderTripBundle\Library;	

use Diff\FileHandlerBundle\Libraries\UploadHelper\UploadFile AS UploadFile ;
use Diff\BassicLayoutBundle\Entity\Files AS Files;

Class UploadTrip extends UploadFile
{
	
	function __construct( )
	{
		parent :: __construct();
	}
	
	protected function Build_FullPath( )
	{
		$this -> FULL_PATH = self :: $BASE_PATH . self :: UPLOAD_TRIP_PATH ;
	}
	
	protected function Chose_RightFiled( Files $Files )
	{
		return $Files -> setTripId( $this -> ID );
	}
	
}

?>