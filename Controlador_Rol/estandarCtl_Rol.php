<?php

class estandarCtl_Rol{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Rol/rolBss.php');

		//creo el objeto de modelo
		$this->modelo = new rolBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$roles_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Rol/RolVistaView.php');

			if(is_array($roles_array)){
				//incluir vista
				include('Vista_Rol/RolVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$rol = $this->modelo->agregar($_REQUEST['nom']);
			if(is_object($rol)){
				//incluir vista
				include('Vista_Rol/RolAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		if($_REQUEST['accion']=='buscar_id'){
			$rol = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($rol)){
				//incluir vista
				include('Vista_Rol/RolBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$rol = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($rol)){
				//incluir vista
				include('Vista_Rol/RolBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
	}
}