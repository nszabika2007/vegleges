<?php

namespace Diff\OrderTripBundle\Library ;

class DeclaratieHelper{

	private $subsemnatul                        = '' ;
	private $institutia                         = '' ;
	private $destinatia                         = '' ;
	private $perioada                           = '' ;
	private $proiect                            = '' ;
	private $director                           = '' ;
	private $data                               = '' ;
	private $declaratie_array                   = '' ;


	function __construct(){

	}

	public function set_subsemnatul( $param='' ){
		$this->subsemnatul=$param;
	}
	public function set_institutia( $param='' ){
		$this->institutia=$param;
	}
	public function set_destinatia( $param='' ){
		$this->destinatia=$param;
	}
	public function set_proiect( $param='' ){
		$this->proiect=$param;
	}
	public function set_director( $param='' ){
		$this->director=$param;
	}
	public function set_data( $param='' ){
		$this->data=$param;
	}

	public function set_perioada( $param='' ){
		$this->perioada=$param;
	}
	public function get_declaratie_array(){

		$this->build_declaratie_array();
		return $this->declaratie_array;

	}
	
	public function build_declaratie_array(){
		return $this->declaratie_array=array(
									'subsemnatul'          => $this->subsemnatul,
									'institutia'           => $this->institutia,
									'destinatia'           => $this->destinatia,
									'proiect'              => $this->proiect,
									'director'             => $this->director,
									'data'                 => $this->data,
									'perioada'             => $this->perioada
									);
	}

}

?>
