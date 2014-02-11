<?php
namespace Diff\BassicLayoutBundle\Helper;
use Symfony\Component\HttpFoundation\Session\Session AS Session;
use Symfony\Bundle\FrameworkBundle\Routing\Router AS Router ;
use Symfony\Component\HttpFoundation\RedirectResponse AS RedirectResponse ;

Class SessionHelper
{
	
	CONST ERROR_FLASH_DATA = "Error";
	
	private static $Session; 
	
	private static $FlashBag ;
	
	private static $Route ;
	
	function __construct( Session $Session , Router $Router )
	{
		self :: $Session = $Session ;
		
		self :: $FlashBag = self :: $Session -> getFlashBag( ) ;
		
		self :: $Route = $Router ;
	}
	
	/**
	 * @Parameter String $Message .
	 */
	
	public static function set_ErrorFlashData( $Message )
	{
		self :: $FlashBag -> add( self :: ERROR_FLASH_DATA , $Message );
	}
	
	/**
	 * 
	 */
	
	public static function RedirectPageTo( $To , $Parameters = Array() )
	{
		$Url = self :: $Route -> generate( $To , $Parameters );
		$RedirectResponse = new RedirectResponse( $Url ) ;
		$RedirectResponse -> setTargetUrl($Url);
		$RedirectResponse -> send();
	}
	 
}

?>