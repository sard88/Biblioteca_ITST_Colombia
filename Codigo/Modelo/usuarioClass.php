<?php
    class Usuario{
	//Atributos
	public $id_usuario;
	public $nombre_usuario;
	public $nick_usuario;
	public $clave;
	public $apellido_usuario;
	public $direccion_usuario;
	public $telefono_usuario;
	public $email_usuario;
	public $genero_usuario;
	public $id_rol;
	
	function __construct($id_usuario, $nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol){
		//Asignar las variables al objeto
		$this -> id_usuario = $id_usuario;
		$this -> nombre_usuario = $nombre_usuario;
		$this -> nick_usuario = $nick_usuario;
		$this -> clave = $clave;
		$this -> apellido_usuario = $apellido_usuario;
		$this -> direccion_usuario = $direccion_usuario;
		$this -> telefono_usuario = $telefono_usuario;
		$this -> email_usuario = $telefono_usuario;
		$this -> genero_usuario = $genero_usuario;
		$this -> id_rol = $id_rol;
	}

}
?>