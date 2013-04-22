<?php

class estandarCtl_Estadolibro{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/estadolibroBss.php');

		//creo el objeto de modelo
		$this->modelo = new estadolibroBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']))
					{
						$estadolibro = $this->modelo->agregar($_REQUEST['nom']);
						if(is_object($estadolibro)){
							//incluir vista
							include('Vista/Vista_Estadolibro/EstadolibroAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar el nombre del estado';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$estadolibro = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($estadolibro)){
							//incluir vista
							include('Vista/Vista_Estadolibro/EstadolibroBuscadoView.php');
						}
						else{
							if($estadolibro == FALSE)
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
						$estadolibros_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($estadolibros_array) ){
							//incluir vista
							include('Vista/Vista_Estadolibro/EstadolibroVistaView.php');
						}
						else{
							if($estadolibros_array == FALSE)
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
						$estadolibro = $this->modelo->eliminar($_REQUEST['id']);
						if($estadolibro == TRUE){
							//incluir vista
							include('Vista/Vista_Estadolibro/EstadolibroEliminadoView.php');
						}
						else{
							if($estadolibro == FALSE)
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
						$estadolibro = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
						if($estadolibro == TRUE){
							//incluir vista
							include('Vista/Vista_Estadolibro/EstadolibroActualizadoView.php');
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
			$estadolibros_array = $this->modelo->listar();

			if ( is_array($estadolibros_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Estadolibro/EstadolibroVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$estadolibros_array = $this->modelo->listar();

			if ( is_array($estadolibros_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Estadolibro/EstadolibroVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}