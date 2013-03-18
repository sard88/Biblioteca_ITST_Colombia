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
	}
}