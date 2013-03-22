<?php

class estandarCtl_Libro{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Libro/libroBss.php');

		//creo el objeto de modelo
		$this->modelo = new libroBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$libros_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Libro/LibroVistaView.php');

			if(is_array($libros_array)){
				//incluir vista
				include('Vista_Libro/LibroVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$libro = $this->modelo->agregar($_REQUEST['nom'],$_REQUEST['pag'], $_REQUEST['cod'], $_REQUEST['ver'], $_REQUEST['edi'], $_REQUEST['est']);
			if(is_object($libro)){
				//incluir vista
				include('Vista_Libro/LibroAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		
		if($_REQUEST['accion']=='buscar_id'){
			$libro = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($libro)){
				//incluir vista
				include('Vista_Libro/LibroBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$libro = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($libro)){
				//incluir vista
				include('Vista_Libro/LibroBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		
		if($_REQUEST['accion']=='eliminar'){
			$libro = $this->modelo->eliminar($_REQUEST['id']);
			if($libro > 0){
				//incluir vista
				include('Vista_Libro/LibroEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$libro = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom'],$_REQUEST['pag'], $_REQUEST['cod'], $_REQUEST['ver'], $_REQUEST['edi'], $_REQUEST['est']);
			if($libro > 0){
				//incluir vista
				include('Vista_Libro/LibroActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}