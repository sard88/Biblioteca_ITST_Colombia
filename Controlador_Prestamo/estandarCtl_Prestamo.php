<?php

class estandarCtl_Prestamo{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Prestamo/prestamoBss.php');

		//creo el objeto de modelo
		$this->modelo = new prestamoBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$prestamos_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Prestamo/PrestamoVistaView.php');

			if(is_array($prestamos_array)){
				//incluir vista
				include('Vista_Prestamo/PrestamoVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$prestamo = $this->modelo->agregar($_REQUEST['usu'],$_REQUEST['fepre'], $_REQUEST['fepro'], $_REQUEST['feent'], $_REQUEST['mul']);
			if(is_object($prestamo)){
				//incluir vista
				include('Vista_Prestamo/PrestamoAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		
		if($_REQUEST['accion']=='buscar_id'){
			$prestamo = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($prestamo)){
				//incluir vista
				include('Vista_Prestamo/PrestamoBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$prestamo = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($prestamo)){
				//incluir vista
				include('Vista_Prestamo/PrestamoBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
		
		if($_REQUEST['accion']=='eliminar'){
			$prestamo = $this->modelo->eliminar($_REQUEST['id']);
			if($prestamo > 0){
				//incluir vista
				include('Vista_Prestamo/PrestamoEliminadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo eliminar');
			}
		}
		if($_REQUEST['accion']=='actualizar'){
			$prestamo = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['usu'],$_REQUEST['fepre'], $_REQUEST['fepro'], $_REQUEST['feent'], $_REQUEST['mul']);
			if($prestamo > 0){
				//incluir vista
				include('Vista_Prestamo/PrestamoActualizadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo actualizar');
			}
		}
	}
}