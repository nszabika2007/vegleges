<?php

namespace Diff\OrderTripBundle\Library ;

class CerereDeOridinHandler{

	private $nr_de_CCI                          = 0  ;
	private $ziua_aprobarii                     = 0  ;
	private $luna_aprobarii                     = 0  ;
	private $anul_aprobarii                     = 0  ;

	private $nume_solicitant                    = '' ;
	private $prenume_solicitant                 = '' ;
	private $titulatura_solicitant              = '' ;
	private $functia_solicitant                 = '' ;
	private $facultatea_solicitant              = '' ;
	private $destinatia_localitatea_solicitant  = '' ;
	private $destinatia_tara_solicitant         = '' ;
	private $scopul_deplasarii_solicitant       = '' ;
	private $ruta_solicitant                    = '' ;
	private $perioada_actiuni_solicitant        = '' ;
	private $data_plecarii_solicitant           = '' ;
	private $data_sosirii_solicitant            = '' ;
	private $cheltuieli_de_deplasare_solicitant = 0  ;
	private $cheltuieli_salariale_solicitant    = 0  ;
	private $nr_telefon_solicitant              = '' ;
	private $email_solicitant                   = '' ;
	private $data_solicitant                    = '' ;
	private $semnatura_solicitant               = '' ;

	private $nr_grant_director_de_grant         = 0  ;
	private $nume_director_de_grant             = '' ;
	private $prenume_director_de_grant          = '' ;
	private $transport_director_de_grant        = '' ;
	private $transport_intern_director_de_grant = '' ;
	private $diurna_director_de_grant           = '' ;
	private $cazare_director_de_grant           = '' ;
	private $taxa_participare_director_de_grant = '' ;
	private $alte_cheltuieli_director_de_grant  = '' ;
	private $total_director_de_grant            = '' ;
	private $data_director_de_grant             = '' ;
	private $semnatura_director_de_grant        = '' ;

	private $transport_decan                    = '' ;
	private $transport_intern_decan             = '' ;
	private $diurna_decan                       = '' ;
	private $cazare_decan                       = '' ;
	private $taxa_participare_decan             = '' ;
	private $alte_cheltuieli_decan              = '' ;
	private $total_decan                        = '' ;
	private $data_decan                         = '' ;
	private $semnatura_decan                    = '' ;

	private $cereredeordin_array                = '' ;

	function __construct(){

	}

	public function set_nr_de_CCI( $param='' ){
		$this->nr_de_CCI=$param;

		return $this ; 
	}
	public function set_ziua_aprobarii( $param='' ){
		$this->ziua_aprobarii=$param;

		return $this ; 
	}
	public function set_luna_aprobarii( $param='' ){
		$this->luna_aprobarii=$param;
		return $this ; 
	}
	public function set_anul_aprobarii( $param='' ){
		$this->anul_aprobarii=$param;
		return $this ; 
	}
	public function set_nume_solicitant( $param='' ){
		$this->nume_solicitant=$param;
		return $this ; 
	}
	public function set_prenume_solicitant( $param='' ){
		$this->prenume_solicitant=$param;
		return $this ; 
	}

	public function set_titulatura_solicitant( $param='' ){
		$this->titulatura_solicitant=$param;
		return $this ; 
	}
	public function set_functia_solicitant( $param='' ){
		$this->functia_solicitant=$param;
		return $this ; 
	}
	public function set_facultatea_solicitant( $param='' ){
		$this->facultatea_solicitant=$param;
		return $this ; 
	}
	public function set_destinatia_localitatea_solicitant( $param='' ){
		$this->destinatia_localitatea_solicitant=$param;
		return $this ; 
	}
	public function set_destinatia_tara_solicitant( $param='' ){
		$this->destinatia_tara_solicitant=$param;
		return $this ; 
	}
	public function set_scopul_deplasarii_solicitant( $param='' ){
		$this->scopul_deplasarii_solicitant=$param;
		return $this ; 
	}
	public function set_ruta_solicitant( $param='' ){
		$this->ruta_solicitant=$param;
		return $this ; 
	}
	public function set_perioada_actiuni_solicitant( $param='' ){
		$this->perioada_actiuni_solicitant=$param;
		return $this ; 
	}
	public function set_data_plecarii_solicitant( $param='' ){
		$this->data_plecarii_solicitant=$param;
		return $this ; 
	}
	public function set_data_sosirii_solicitant( $param='' ){
		$this->data_sosirii_solicitant=$param;
		return $this ; 
	}
	public function set_cheltuieli_de_deplasare_solicitant( $param='' ){
		$this->cheltuieli_de_deplasare_solicitant=$param;
		return $this ; 
	}
	public function set_cheltuieli_salariale_solicitant( $param='' ){
		$this->cheltuieli_salariale_solicitant=$param;
		return $this ; 
	}
	public function set_nr_telefon_solicitant( $param='' ){
		$this->nr_telefon_solicitant=$param;
	}
	public function set_email_solicitant( $param='' ){
		$this->email_solicitant=$param;
	}
	public function set_data_solicitant( $param='' ){
		$this->data_solicitant=$param;
	}
	public function set_semnatura_solicitant( $param='' ){
		$this->semnatura_solicitant=$param;
	}
	public function set_nr_grant_director_de_grant( $param='' ){
		$this->nr_grant_director_de_grant=$param;
	}
	public function set_nume_director_de_grant( $param='' ){
		$this->nume_director_de_grant=$param;
	}
	public function set_prenume_director_de_grant( $param='' ){
		$this->prenume_director_de_grant=$param;
	}
	public function set_transport_director_de_grant( $param='' ){
		$this->transport_director_de_grant=$param;
	}
	public function set_transport_intern_director_de_grant( $param='' ){
		$this->transport_intern_director_de_grant=$param;
	}
	public function set_diurna_director_de_grant( $param='' ){
		$this->diurna_director_de_grant=$param;
	}
	public function set_cazare_director_de_grant( $param='' ){
		$this->cazare_director_de_grant=$param;
	}
	public function set_taxa_participare_director_de_grant( $param='' ){
		$this->taxa_participare_director_de_grant=$param;
	}
	public function set_alte_cheltuieli_director_de_grant( $param='' ){
		$this->alte_cheltuieli_director_de_grant=$param;
	}
	public function set_total_director_de_grant( $param='' ){
		$this->total_director_de_grant=$param;
	}
	public function set_data_director_de_grant( $param='' ){
		$this->data_director_de_grant=$param;
	}
	public function set_semnatura_director_de_grant( $param='' ){
		$this->semnatura_director_de_grant=$param;
	}
	public function set_transport_decan( $param='' ){
		$this->transport_decan=$param;
	}
	public function set_transport_intern_decan( $param='' ){
		$this->transport_intern_decan=$param;
	}
	public function set_diurna_decan( $param='' ){
		$this->diurna_decan=$param;
	}
	public function set_cazare_decan( $param='' ){
		$this->cazare_decan=$param;
	}
	public function set_taxa_participare_decan( $param='' ){
		$this->taxa_participare_decan=$param;
	}
	public function set_alte_cheltuieli_decan( $param='' ){
		$this->alte_cheltuieli_decan=$param;
	}
	public function set_total_decan( $param='' ){
		$this->total_decan=$param;
	}
	public function set_data_decan( $param='' ){
		$this->data_decan=$param;
	}
	public function set_semnatura_decan( $param='' ){
		$this->semnatura_decan=$param;
	}

	public function get_cerereordin_array(){

		$this->build_cereredeordin_array();
		return $this->cereredeordin_array;

	}

	public function build_cereredeordin_array(){
		$this->cereredeordin_array=array(
									'nr_de_CCI'                          => $this->nr_de_CCI,
									'ziua_aprobarii'                     => $this->ziua_aprobarii,
									'luna_aprobarii'                     => $this->luna_aprobarii,
									'anul_aprobarii'                     => $this->anul_aprobarii,
									'nume_solicitant'                    => $this->nume_solicitant,
									'prenume_solicitant'                 => $this->prenume_solicitant,
									'titulatura_solicitant'              => $this->titulatura_solicitant,
									'functia_solicitant'                 => $this->functia_solicitant,
									'facultatea_solicitant'              => $this->facultatea_solicitant,
									'destinatia_localitatea_solicitant'  => $this->destinatia_localitatea_solicitant,
									'destinatia_tara_solicitant'         => $this->destinatia_tara_solicitant,
									'scopul_deplasarii_solicitant'       => $this->scopul_deplasarii_solicitant,
									'ruta_solicitant'                    => $this->ruta_solicitant,
									'perioada_actiuni_solicitant'        => $this->perioada_actiuni_solicitant,
									'data_plecarii_solicitant'           => $this->data_plecarii_solicitant,
									'data_sosirii_solicitant'            => $this->data_sosirii_solicitant,
									'cheltuieli_de_deplasare_solicitant' => $this->cheltuieli_de_deplasare_solicitant,
									'cheltuieli_salariale_solicitant'    => $this->cheltuieli_salariale_solicitant,
									'nr_telefon_solicitant'              => $this->nr_telefon_solicitant,
									'email_solicitant'                   => $this->email_solicitant,      
									'data_solicitant'                    => $this->data_solicitant,
									'semnatura_solicitant'               => $this->semnatura_solicitant,
									'nr_grant_director_de_grant'         => $this->nr_grant_director_de_grant,
									'nume_director_de_grant'             => $this->nume_director_de_grant,
									'prenume_director_de_grant'          => $this->prenume_director_de_grant,
									'transport_director_de_grant'        => $this->transport_director_de_grant,
									'transport_intern_director_de_grant' => $this->transport_intern_director_de_grant,
									'diurna_director_de_grant'           => $this->diurna_director_de_grant,
									'cazare_director_de_grant'           => $this->cazare_director_de_grant,
									'taxa_participare_director_de_grant' => $this->taxa_participare_director_de_grant,
									'alte_cheltuieli_director_de_grant'  => $this->alte_cheltuieli_director_de_grant,
									'total_director_de_grant'            => $this->total_director_de_grant,
									'data_director_de_grant'             => $this->data_director_de_grant,
									'semnatura_director_de_grant'        => $this->semnatura_director_de_grant,
									'transport_decan'                    => $this->transport_decan,
									'transport_intern_decan'             => $this->transport_intern_decan,
									'diurna_decan'                       => $this->diurna_decan,
									'cazare_decan'                       => $this->cazare_decan,
									'taxa_participare_decan'             => $this->taxa_participare_decan,
									'alte_cheltuieli_decan'              => $this->alte_cheltuieli_decan,
									'total_decan'                        => $this->total_decan,
									'data_decan'                         => $this->data_decan,
									'semnatura_decan'                    => $this->semnatura_decan
									);
	}
	
	/**
	 * 
	 */
	
	public function HandleView_Generating( $CerereDeOrdin , $User , $Trip )
	{
		
		$this->nr_de_CCI = $CerereDeOrdin->getCci();
		
		$date = explode ( '-' , date( 'Y-m-d' , strtotime( $CerereDeOrdin->getDate1() ) )  );
		$this->ziua_aprobarii = $date[2];
		$this->luna_aprobarii = $date[1];
		$this->anul_aprobarii = $date[0];
		
		$this->nume_solicitant = $User->getFirstname();
		$this->prenume_solicitant = $User->getLastname();
		$this->titulatura_solicitant = '';
		$this->functia_solicitant = 'Profesor';
		$this->facultatea_solicitant = $User->getUniversity();
		$this->destinatia_localitatea_solicitant = $CerereDeOrdin->getDlocality();
		$this->destinatia_tara_solicitant =  $CerereDeOrdin->getDcountry();
		$this->scopul_deplasarii_solicitant = $CerereDeOrdin->getDscop();
		$this->ruta_solicitant = $CerereDeOrdin->getDroute();
		$this->perioada_actiuni_solicitant = $CerereDeOrdin->getPreiod();
		$this->data_plecarii_solicitant = $CerereDeOrdin->getDgo();
		$this->data_sosirii_solicitant = $CerereDeOrdin->getDcome();
		$this->cheltuieli_de_deplasare_solicitant = $CerereDeOrdin->getCheltuieli();
		$this->cheltuieli_salariale_solicitant = $CerereDeOrdin->getCsalariale();
		$this->nr_telefon_solicitant = $User->getTel();
		$this->email_solicitant = $User->getEmail();
		$this->data_solicitant = $CerereDeOrdin->getDatecreated();
		$this->semnatura_solicitant = '';
		
		$this->nr_grant_director_de_grant = $CerereDeOrdin->getNrgf();
		$this->nume_director_de_grant = $CerereDeOrdin->getNamef();
		$this->prenume_director_de_grant = '';
		$this->transport_director_de_grant = $CerereDeOrdin->getTranspif();
		$this->transport_intern_director_de_grant = $CerereDeOrdin->getTranspintf();
		$this->diurna_director_de_grant = $CerereDeOrdin->getDiaurinaf();
		$this->cazare_director_de_grant = $CerereDeOrdin->getCazaref();
		$this->taxa_participare_director_de_grant = $CerereDeOrdin->getTaxaf();
		$this->alte_cheltuieli_director_de_grant = $CerereDeOrdin->getAltchelf();
		$this->total_director_de_grant = $CerereDeOrdin->getTotalf();
		$this->data_director_de_grant = $CerereDeOrdin->getDatef();
		$this->semnatura_director_de_grant = '';
		
		$this->transport_decan = $CerereDeOrdin->getTranpsid();
		$this->transport_intern_decan = $CerereDeOrdin->getTranspintd();
		$this->diurna_decan = $CerereDeOrdin->getDiaurnad();
		$this->cazare_decan = $CerereDeOrdin->getCazared();
		$this->taxa_participare_decan = $CerereDeOrdin->getTaxad();
		$this->alte_cheltuieli_decan = $CerereDeOrdin->getAltcheld();
		$this->total_decan = $CerereDeOrdin->getTotald();
		$this->data_decan = $CerereDeOrdin->getDated();
		$this->semnatura_decan = '';
		
		
		$this -> build_cereredeordin_array( ) ;
		
		return $this -> cereredeordin_array ;
	}
	
}

?>
