<?php
    class Prestamo{
	//Atributos
	public $id_prestamo;
	public $id_usuario;
	public $fecha_prestamo;
	public $fecha_propuesta;
	public $fecha_entrega;
	public $multa;
	
	
	
	function __construct($id_prestamo, $id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa){
		//Asignar las variables al objeto
		$this -> id_prestamo = $id_prestamo;
		$this -> id_usuario = $id_usuario;
		$this -> fecha_prestamo = $fecha_prestamo;
		$this -> fecha_propuesta = $fecha_propuesta;
		$this -> fecha_entrega = $fecha_entrega;
		$this -> multa = $multa;
	}

}
?>