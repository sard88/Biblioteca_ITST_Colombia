<?php
    class Editorial{
	//Atributos
	public $id_editorial;
	public $nombre_editorial;
	
	function __construct($id_editorial, $nombre_editorial){
		//Asignar las variables al objeto
		$this -> id_editorial = $id_editorial;
		$this -> nombre_editorial = $nombre_editorial;
	}

}
?>