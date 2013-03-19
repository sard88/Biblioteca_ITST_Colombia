<?php

class estandarCtl_Estadolibro{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Estadolibro/estadolibroBss.php');

		//creo el objeto de modelo
		$this->modelo = new estadolibroBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$estadolibros_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Estadolibro/EstadolibroVistaView.php');

			if(is_array($estadolibros_array)){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$estadolibro = $this->modelo->agregar($_REQUEST['nom']);
			if(is_object($estadolibro)){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		if($_REQUEST['accion']=='buscar_id'){
			$estadolibro = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($estadolibro)){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$estadolibro = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($estadolibro)){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		if($_REQUEST['accion']=='eliminar'){
			$estadolibro = $this->modelo->eliminar($_REQUEST['id']);
			if($estadolibro > 0){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$estadolibro = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
			if($estadolibro > 0){
				//incluir vista
				include('Vista_Estadolibro/EstadolibroActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}