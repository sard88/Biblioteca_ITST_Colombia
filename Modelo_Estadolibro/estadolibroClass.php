<?php
    class Estadolibro{
	//Atributos
	public $id_estadolibro;
	public $nombre_estadolibro;
	
	function __construct($id_estadolibro, $nombre_estadolibro){
		//Asignar las variables al objeto
		$this -> id_estadolibro = $id_estadolibro;
		$this -> nombre_estadolibro = $nombre_estadolibro;
	}

}
?>