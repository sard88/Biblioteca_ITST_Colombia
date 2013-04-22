<?php

class estandarCtl_Tema{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/temaBss.php');

		//creo el objeto de modelo
		$this->modelo = new temaBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']))
					{
						$tema = $this->modelo->agregar($_REQUEST['nom']);
						if(is_object($tema)){
							//incluir vista
							include('Vista/Vista_Tema/TemaAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar un nombre del tema';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$tema = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($tema)){
							//incluir vista
							include('Vista/Vista_Tema/TemaBuscadoView.php');
						}
						else{
							if($tema == FALSE)
							{
								echo 'No se encontro el registro';
							}
							else {
								//mando a llamar la lista de errores
								echo 'No se pudo buscar';
							}
						}
					}
					else {
						echo 'Debe ingresar un id para realizar la busqueda';
					}
				break;
				
			case 'buscar_nombre' :
				if(isset($_REQUEST['nom']))
					{
						$temas_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($temas_array) ){
							//incluir vista
							include('Vista/Vista_Tema/TemaVistaView.php');
						}
						else{
							if($temas_array == FALSE)
							{
								echo 'No se encontraron registros con ese nombre';
							}
							else {
								//mando a llamar la lista de errores
								echo 'No se pudo buscar';
							}
						}
					}
					else {
						echo 'Debe ingresar un nombre para realizar la busqueda';
					}
				break;
				
			case 'eliminar' :
				if(isset($_REQUEST['id']))
					{
						$tema = $this->modelo->eliminar($_REQUEST['id']);
						if($tema == TRUE){
							//incluir vista
							include('Vista/Vista_Tema/TemaEliminadoView.php');
						}
						else{
							if($tema == FALSE)
							{
								echo 'No se encontro ningun registro con ese id';
							}
							else {
								//mando a llamar la lista de errores
								echo 'No se pudo eliminar';
							}
						}
					}
					else {
						echo 'Debe ingresar un id para eliminar';
					}
				break;
				
			case 'actualizar' :
				if(isset($_REQUEST['id']) && isset($_REQUEST['nom']))
					{
						$tema = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
						if($tema == TRUE){
							//incluir vista
							include('Vista/Vista_Tema/TemaActualizadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo actualizar';
						}
					}
					else {
						echo 'Debe ingresar un id valido y/o un nuevo nombre';
					}
				break;
				
			default :
			$temas_array = $this->modelo->listar();

			if ( is_array($temas_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Tema/TemaVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$temas_array = $this->modelo->listar();

			if ( is_array($temas_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Tema/TemaVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}