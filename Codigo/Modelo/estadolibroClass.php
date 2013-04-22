<?php
    class Estadolibro{
	//Atributos
	public $id_estado_libro;
	public $nombre_estado_libro;
	
	function __construct($id_estado_libro, $nombre_estado_libro){
		//Asignar las variables al objeto
		$this -> id_estado_libro = $id_estado_libro;
		$this -> nombre_estado_libro = $nombre_estado_libro;
	}

}
?>