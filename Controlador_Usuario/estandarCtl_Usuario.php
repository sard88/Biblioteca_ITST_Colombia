<?php

class estandarCtl_Usuario{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Usuario/usuarioBss.php');

		//creo el objeto de modelo
		$this->modelo = new usuarioBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$usuarios_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Usuario/UsuarioVistaView.php');

			if(is_array($usuarios_array)){
				//incluir vista
				include('Vista_Usuario/UsuarioVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$usuario = $this->modelo->agregar($_REQUEST['nom'],$_REQUEST['nic'], $_REQUEST['cla'], $_REQUEST['ape'], $_REQUEST['dir'], $_REQUEST['tel'], $_REQUEST['ema'], $_REQUEST['gen'], $_REQUEST['rol']);
			if(is_object($usuario)){
				//incluir vista
				include('Vista_Usuario/UsuarioAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		
		if($_REQUEST['accion']=='buscar_id'){
			$usuario = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($usuario)){
				//incluir vista
				include('Vista_Usuario/UsuarioBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$usuario = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($usuario)){
				//incluir vista
				include('Vista_Usuario/UsuarioBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		
		if($_REQUEST['accion']=='eliminar'){
			$usuario = $this->modelo->eliminar($_REQUEST['id']);
			if($usuario > 0){
				//incluir vista
				include('Vista_Usuario/UsuarioEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$usuario = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom'],$_REQUEST['nic'], $_REQUEST['cla'], $_REQUEST['ape'], $_REQUEST['dir'],$_REQUEST['tel'],$_REQUEST['ema'],$_REQUEST['gen'],$_REQUEST['rol']);
			if($usuario > 0){
				//incluir vista
				include('Vista_Usuario/UsuarioActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}