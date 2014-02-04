<?php

namespace Diff\StatsBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Symfony\Bundle\FrameworkBundle\Routing\Router AS Router ;


Class StatsForm
{
	
	private $FormBuilder ;
	
	Private $Form ;
	
	private $CondOrder = false ;
	
	private $CondTrip = false ;
	
	private $FormSubmit_URL = "";
	
	private $Type = "";
	
	function __construct( FormFactory $FormFactory , Router $Router)
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> FormSubmit_URL = $Router -> generate('stats_homepage');
	}
	
	public function Is_ForOrder( )
	{
		$this -> CondOrder = true ;
		$this -> Type = "ORDER";
		return $this ;
	}
	
	public function Is_ForTrip( )
	{
		$this -> CondTrip = true ;
		$this -> Type = "TRIP";
		return $this ;
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder
		 		-> add( 'from_date' , 'text' , array( 
								'label' => 'From Date',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'to_date' , 'text' , array( 
								'label' => 'To Date',
								'attr' 	=> array( 'class' => 'form-control' ) ,
							) )		
				-> add( 'type' , 'hidden' , array( 
								'label' => 'File',
								'attr' 	=> array( 'class' => '' ) ,
								'data'	=> $this -> Type
							) )					
				-> add( 'Save' , 'submit' , array(
											'attr'	=> array( 
															'class' => 'btn btn-primary pull-right'						
															) 
										) ) ;
	}
	
	/**
	 * 
	 */
	
	public function HandleRequest( Request $Request )
	{	
		$this -> Form -> handleRequest( $Request );
		
		if ( ! $this -> Form -> isValid( ) ) 
			return ;
		
		$FormData = $this -> Form -> getData( );
	}
	
	public function Generate_Form( )
	{
		$this -> Build_Form( );
		
		$this -> FormBuilder -> setAction( $this -> FormSubmit_URL );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>