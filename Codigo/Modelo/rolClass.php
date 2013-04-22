<?php
    class Rol{
	//Atributos
	public $id_rol;
	public $nombre_rol;
	
	function __construct($id_rol, $nombre_rol){
		//Asignar las variables al objeto
		$this -> id_rol = $id_rol;
		$this -> nombre_rol = $nombre_rol;
	}

}
?>