<?php

class estandarCtl_Autor{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Autor/autorBss.php');

		//creo el objeto de modelo
		$this->modelo = new autorBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$autores_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Autor/AutorVistaView.php');

			if(is_array($autores_array)){
				//incluir vista
				include('Vista_Autor/AutorVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$autor = $this->modelo->agregar($_REQUEST['nom']);
			if(is_object($autor)){
				//incluir vista
				include('Vista_Autor/AutorAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		if($_REQUEST['accion']=='buscar_id'){
			$autor = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($autor)){
				//incluir vista
				include('Vista_Autor/AutorBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$autor = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($autor)){
				//incluir vista
				include('Vista_Autor/AutorBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		if($_REQUEST['accion']=='eliminar'){
			$autor = $this->modelo->eliminar($_REQUEST['id']);
			if($autor > 0){
				//incluir vista
				include('Vista_Autor/AutorEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$autor = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
			if($autor > 0){
				//incluir vista
				include('Vista_Autor/AutorActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}