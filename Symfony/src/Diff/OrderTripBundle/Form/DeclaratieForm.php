<?php
namespace Diff\OrderTripBundle\Form;

use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Declaratie AS Declaratie ;

Class DeclaratieForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $ProductRepository ;
	
	Private $EntityManager ;
	
	function __construct( FormFactory $FormFactory , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> ProductRepository = $EntityManager -> getRepository( 'OrderTripBundle:Declaratie' );
	}
	
	private function Build_Form( )
	{
		$this 	-> FormBuilder 
				-> add( 'proiect' , 'text' , array( 
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'director' , 'text' , array( 
								'label' => 'Director Proiect',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'dateee' , 'text' , array( 
								'label' => 'Data',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )

				-> add( 'Save' , 'submit' , array(
								'attr'	=> array( 

												'class' => 'btn btn-primary pull-right'
												)
							) ) ;
	}
	
	
	public function HandleRequest( Request $Request , $TripID )
	{	
		$this -> Form -> handleRequest( $Request );
		if ( $this -> Form -> isValid( ) ) 
		{
				
			$FormData = $this -> Form -> getData( );
			$decalratie = new Declaratie();
			$decalratie ->setTripid( $TripID )
						->setCode($FormData['proiect'])
						->setName($FormData['director'])
						->setDate( new \DateTime ($FormData['dateee'] ) );
			$this -> EntityManager -> persist( $decalratie );		
			$this -> EntityManager -> flush( );
		}
	}	

	public function Generate_DeclaratieForm( $url )
	{
		$this -> Build_Form( );
		
		$this -> FormBuilder -> setAction( $url ) ;
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>