<?php

class estandarCtl_Rol{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/rolBss.php');

		//creo el objeto de modelo
		$this->modelo = new rolBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']))
					{
						$rol = $this->modelo->agregar($_REQUEST['nom']);
						if(is_object($rol)){
							//incluir vista
							include('Vista/Vista_Rol/RolAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar un nombre del rol';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$rol = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($rol)){
							//incluir vista
							include('Vista/Vista_Rol/RolBuscadoView.php');
						}
						else{
							if($rol == FALSE)
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
						$roles_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($roles_array) ){
							//incluir vista
							include('Vista/Vista_Rol/RolVistaView.php');
						}
						else{
							if($roles_array == FALSE)
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
						$rol = $this->modelo->eliminar($_REQUEST['id']);
						if($rol == TRUE){
							//incluir vista
							include('Vista/Vista_Rol/RolEliminadoView.php');
						}
						else{
							if($rol == FALSE)
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
						$rol = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
						if($rol == TRUE){
							//incluir vista
							include('Vista/Vista_Rol/RolActualizadoView.php');
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
			$roles_array = $this->modelo->listar();

			if ( is_array($roles_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Rol/RolVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$roles_array = $this->modelo->listar();

			if ( is_array($roles_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Rol/RolVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}