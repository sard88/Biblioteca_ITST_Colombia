<?php

class estandarCtl_Editorial{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo_Editorial/editorialBss.php');

		//creo el objeto de modelo
		$this->modelo = new editorialBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$editoriales_array = $this->modelo->listar();
			//incluir la vista
			include('Vista_Editorial/EditorialVistaView.php');

			if(is_array($editoriales_array)){
				//incluir vista
				include('Vista_Editorial/EditorialVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$editorial = $this->modelo->agregar($_REQUEST['nom']);
			if(is_object($editorial)){
				//incluir vista
				include('Vista_Editorial/EditorialAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
	}
}