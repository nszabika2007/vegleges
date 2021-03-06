<?php
namespace Diff\OrderTripBundle\Form;
use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Cerereordins AS Cerereordins ;
use Diff\BassicLayoutBundle\Helper\SessionHelper AS SessionHelper;

Class CerereOrdinForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $ProductRepository ;
	
	Private $EntityManager ;
	
	private $SessionHelper ;
	
	private $Defaults ; 
	
	function __construct( FormFactory $FormFactory , EntityManager $EntityManager ,  SessionHelper $SessionHelper )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> SessionHelper = $SessionHelper ;
		
		$this -> ProductRepository = $EntityManager -> getRepository( 'OrderTripBundle:Cerereordins' );
	}

	public function Build_Defaults( $TripObject , $UserObject )
	{
		$this -> Defaults = new \stdClass( ) ;
		$this -> Defaults -> Total = $TripObject -> getProvidedamount( ) ;
		$this -> Defaults -> Destination = $TripObject -> getDestination( ) ;
	}
	
	private function Build_Form( )
	{
	$this 	-> FormBuilder 
				-> add( 'Destination' , 'text' , array( 
								'label' => 'Destiantia Localitatea',
								'attr' 	=> array( 'class' => 'form-control' ) ,
								'data'	=> @$this -> Defaults -> Destination
							) )
				-> add( 'Destination2' , 'text' , array( 
								'label' => 'Destiantia Tara',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Scopul' , 'text' , array( 
								'label' => 'Scopul deplasarii',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Ruta' , 'text' , array( 
								'label' => 'Ruta',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Preioada' , 'text' , array( 
								'label' => 'Perioada',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Data' , 'text' , array( 
								'label' => 'Data plecarii',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'Data2' , 'text' , array( 
								'label' => 'Data sosirii',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'cheltuieri' , 'text' , array( 
								'label' => 'Cheltuieri de deplasare',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'cheltuieri2' , 'text' , array( 
								'label' => 'Cheltuieri salariale',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'today' , 'text' , array( 
								'label' => 'Data(azi)',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'dedirector' , 'text' , array( 
								'label' => ' ',
								'attr' 	=> array( 
										'value'=>'SE COMPLETEAZA DE CATRE DIRECTORUL DE GRANT',
										'class' => 'form-control',
										'readonly'=>'readonly'
									)
							) )
				-> add( 'nrcontactf' , 'text' , array( 
								'label' => 'Nr. contact',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'namef' , 'text' , array( 
								'label' => 'Nume Prenume director',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Transportf' , 'text' , array( 
								'label' => 'Transport',
								'attr' 	=> array( 'class' => 'form-control tranps' )
							) )
				-> add( 'Transport_internf' , 'text' , array( 
								'label' => 'Transport intern',
								'attr' 	=> array( 'class' => 'form-control transp_intern' )
							) )
				-> add( 'Diurnaf' , 'text' , array( 
								'label' => 'Diurna',
								'attr' 	=> array( 'class' => 'form-control diaurina' )
							) )
				-> add( 'Cazaref' , 'text' , array( 
								'label' => 'Cazare',
								'attr' 	=> array( 'class' => 'form-control cazare' )
							) )
				-> add( 'Taxa_participaref' , 'text' , array( 
								'label' => 'Taxa participare',
								'attr' 	=> array( 'class' => 'form-control taxa_participare' )
							) )
				-> add( 'cheltiueli_af' , 'text' , array( 
								'label' => 'Alte cheltuieli',
								'attr' 	=> array( 'class' => 'form-control cheltuieli' )
							) )
				-> add( 'Totalf' , 'text' , array( 
								'label' => 'Total',
								'attr' 	=> array( 'class' => 'form-control total' ) ,
								'data'	=>	@$this -> Defaults -> Total
							) )
				-> add( 'datef' , 'text' , array( 
								'label' => 'Data',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'Save' , 'submit' , array(
								'attr'	=> array( 
												'class' => 'btn btn-primary pull-right calculate'
												)
							) ) ;
	}
	
	
	public function HandleRequest( Request $Request  , $TripID)
	{	
		$this -> Form -> handleRequest( $Request );
		

		if ( $this -> Form -> isValid( ) ) 
		{
			$FormData = $this -> Form -> getData( );
			$Cerereordins = new Cerereordins();
			
			$Spendings = $FormData["Transportf"] + $FormData["Transport_internf"] + $FormData["Diurnaf"] 
					+ $FormData["Cazaref"] + $FormData["Taxa_participaref"] + $FormData["cheltiueli_af"];
			
			if( $Spendings != $FormData['Totalf'] )
			{
				
				$this -> SessionHelper -> set_ErrorFlashData( "The Entered Values Do not match up with the Total !" );
				$this -> SessionHelper -> RedirectPageTo( "view_trip" , array( "TripID" => $TripID ) );
				return ;
			}
			
				$Cerereordins-> setTripid( $TripID )
				-> setDlocality($FormData['Destination'])
				-> setDcountry($FormData['Destination2'])
				-> setDscop($FormData['Scopul'])
				-> setDroute($FormData['Ruta'])
				-> setPreiod($FormData['Preioada'])
				-> setDgo($FormData['Data'])
				-> setDcome($FormData['Data2'])
				-> setCheltuieli($FormData['cheltuieri'])
				-> setCsalariale($FormData['cheltuieri2'])
				-> setDatecreated($FormData['today'])
				-> setNrgf($FormData['nrcontactf'])
				-> setNamef($FormData['namef'])
				-> setTranspif($FormData['Transportf'])
				-> setTranspintf($FormData['Transport_internf'])
				-> setDiaurinaf($FormData['Diurnaf'])
				-> setCazaref($FormData['Cazaref'])
				-> setTaxaf($FormData['Taxa_participaref'])
				-> setAltchelf($FormData['cheltiueli_af'])
				-> setTotalf($FormData['Totalf'])
				-> setDatef($FormData['datef']);
			$this -> EntityManager -> persist( $Cerereordins );		
			$this -> EntityManager -> flush( );
		}
	}
	
	
	public function Generate_TripForm( $url )
	{
		$this -> Build_Form( );
		
		$this -> FormBuilder -> setAction( $url );
		
		$this -> Form = $this -> FormBuilder -> getForm();
		
		return $this -> Form;
	}
	
}

?>