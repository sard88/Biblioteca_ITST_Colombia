<?php
    class Tema{
	//Atributos
	public $id_tema;
	public $nombre_tema;
	
	function __construct($id_tema, $nombre_tema){
		//Asignar las variables al objeto
		$this -> id_tema = $id_tema;
		$this -> nombre_tema = $nombre_tema;
	}

}
?>