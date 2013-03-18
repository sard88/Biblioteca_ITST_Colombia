<?php
    class Autor{
	//Atributos
	public $id_autor;
	public $nombre_autor;
	
	function __construct($id_autor, $nombre_autor){
		//Asignar las variables al objeto
		$this -> id_autor = $id_autor;
		$this -> nombre_autor = $nombre_autor;
	}

}
?>