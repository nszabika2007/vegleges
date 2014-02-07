<?php
namespace Diff\OrderTripBundle\Form;
use Symfony\Component\HttpFoundation\Request AS Request ;
use Symfony\Component\Form\FormFactory AS FormFactory ;
use Doctrine\ORM\EntityManager AS EntityManager ;
use Diff\OrderTripBundle\Entity\Cerereordins AS Cerereordins ;

Class CerereOrdinForm
{
	
	Private $FormBuilder ;
	
	Private $Form ;
	
	Private $ProductRepository ;
	
	Private $EntityManager ;

	
	function __construct( FormFactory $FormFactory , EntityManager $EntityManager  )
	{
		$this -> FormBuilder = $FormFactory -> createBuilder( 'form' ) ;
		
		$this -> EntityManager = $EntityManager ;
		
		$this -> ProductRepository = $EntityManager -> getRepository( 'OrderTripBundle:Cerereordins' );
	}

	
	private function Build_Form( )
	{
	$this 	-> FormBuilder 
				-> add( 'IntrareCCI' , 'text' , array( 
								'label' => 'Nr. de intrare CCI',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Aprobat' , 'text' , array( 
								'label' => 'Aprobat',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'Destination' , 'text' , array( 
								'label' => 'Destiantia Localitatea',
								'attr' 	=> array( 'class' => 'form-control' )
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
								'label' => 'Cheltuieri salariale',
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
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Transport_internf' , 'text' , array( 
								'label' => 'Transport intern',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Diurnaf' , 'text' , array( 
								'label' => 'Diurna',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Cazaref' , 'text' , array( 
								'label' => 'Cazare',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Taxa_participaref' , 'text' , array( 
								'label' => 'Taxa participare',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'cheltiueli_af' , 'text' , array( 
								'label' => 'Alte cheltuieli',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Totalf' , 'text' , array( 
								'label' => 'Total',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'datef' , 'text' , array( 
								'label' => 'Data',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )
				-> add( 'dedecan' , 'text' , array( 
								'label' => ' ',
								'attr' 	=> array( 
										'value'=>'SE COMPLETEAZA DE CATRE DECANUL FACULTATII',
										'class' => 'form-control',
										'readonly'=>'readonly'
									)
							) )
				-> add( 'Transportd' , 'text' , array( 
								'label' => 'Transport',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Transport_internd' , 'text' , array( 
								'label' => 'Transport intern',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Diurnad' , 'text' , array( 
								'label' => 'Diurna',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Cazared' , 'text' , array( 
								'label' => 'Cazare',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Taxa_participared' , 'text' , array( 
								'label' => 'Taxa participare',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'cheltiueli_ad' , 'text' , array( 
								'label' => 'Alte cheltuieli',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'Totald' , 'text' , array( 
								'label' => 'Total',
								'attr' 	=> array( 'class' => 'form-control' )
							) )
				-> add( 'dated' , 'text' , array( 
								'label' => 'Data',
								'attr' 	=> array( 'class' => 'form-control datepicker' )
							) )

				-> add( 'Save' , 'submit' , array(
								'attr'	=> array( 
												'class' => 'btn btn-primary pull-right'
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
			
				$Cerereordins-> setTripid( $TripID )
				-> setCci($FormData['IntrareCCI'])				
				-> setDate1($FormData['Aprobat'])
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
				-> setDatef($FormData['datef'])
				-> setNrgd('Someth')
				-> setNamed('Someth')
				-> setTranpsid($FormData['Transportd'])
				-> setTranspintd($FormData['Transport_internd'])
				-> setDiaurnad($FormData['Diurnad'])
				-> setCazared($FormData['Cazared'])
				-> setTaxad($FormData['Taxa_participared'])
				-> setAltcheld($FormData['cheltiueli_ad'])
				-> setTotald($FormData['Totald'])
				-> setDated($FormData['dated']);
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