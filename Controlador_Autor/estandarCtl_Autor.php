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
	}
}