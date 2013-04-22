<?php

class estandarCtl_Editorial{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/editorialBss.php');

		//creo el objeto de modelo
		$this->modelo = new editorialBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']))
					{
						$editorial = $this->modelo->agregar($_REQUEST['nom']);
						if(is_object($editorial)){
							//incluir vista
							include('Vista/Vista_Editorial/EditorialAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar un nombre de la editorial';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$editorial = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($editorial)){
							//incluir vista
							include('Vista/Vista_Editorial/EditorialBuscadoView.php');
						}
						else{
							if($editorial == FALSE)
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
						$editoriales_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($editoriales_array) ){
							//incluir vista
							include('Vista/Vista_Editorial/EditorialVistaView.php');
						}
						else{
							if($editoriales_array == FALSE)
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
						$editorial = $this->modelo->eliminar($_REQUEST['id']);
						if($editorial == TRUE){
							//incluir vista
							include('Vista/Vista_Editorial/EditorialEliminadoView.php');
						}
						else{
							if($editorial == FALSE)
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
						$editorial = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
						if($editorial == TRUE){
							//incluir vista
							include('Vista/Vista_Editorial/EditorialActualizadoView.php');
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
			$editoriales_array = $this->modelo->listar();

			if ( is_array($editoriales_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Editorial/EditorialVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$editoriales_array = $this->modelo->listar();

			if ( is_array($editoriales_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Editorial/EditorialVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}