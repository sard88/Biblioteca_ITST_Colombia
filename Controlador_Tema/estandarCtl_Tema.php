<?php

class estandarCtl_Tema{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Tema/temaBss.php');

		//creo el objeto de modelo
		$this->modelo = new temaBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$temas_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Tema/TemaVistaView.php');

			if(is_array($temas_array)){
				//incluir vista
				include('Vista_Tema/TemaVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$tema = $this->modelo->agregar($_REQUEST['nom']);
			if(is_object($tema)){
				//incluir vista
				include('Vista_Tema/TemaAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		
		if($_REQUEST['accion']=='buscar_id'){
			$tema = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($tema)){
				//incluir vista
				include('Vista_Tema/TemaBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$tema = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($tema)){
				//incluir vista
				include('Vista_Tema/TemaBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		
		if($_REQUEST['accion']=='eliminar'){
			$tema = $this->modelo->eliminar($_REQUEST['id']);
			if($tema > 0){
				//incluir vista
				include('Vista_Tema/TemaEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$tema = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
			if($tema > 0){
				//incluir vista
				include('Vista_Tema/TemaActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}