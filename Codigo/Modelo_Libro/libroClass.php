<?php
    class Libro{
	//Atributos
	public $id_libro;
	public $nombre_libro;
	public $paginas_libro;
	public $codigo_libro;
	public $version_libro;
	public $id_editorial;
	public $id_estado_libro;
	
	
	
	function __construct($id_libro, $nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro){
		//Asignar las variables al objeto
		$this -> id_libro = $id_libro;
		$this -> nombre_libro = $nombre_libro;
		$this -> paginas_libro = $paginas_libro;
		$this -> codigo_libro = $codigo_libro;
		$this -> version_libro = $version_libro;
		$this -> id_editorial = $id_editorial;
		$this -> id_estado_libro = $id_estado_libro;
	}

}
?>