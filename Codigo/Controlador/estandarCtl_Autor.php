<?php

class estandarCtl_Autor{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/autorBss.php');

		//creo el objeto de modelo
		$this->modelo = new autorBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']))
					{
						$autor = $this->modelo->agregar($_REQUEST['nom']);
						if(is_object($autor)){
							//incluir vista
							include('Vista/Vista_Autor/AutorAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar el nombre del autor';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$autor = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($autor)){
							//incluir vista
							include('Vista/Vista_Autor/AutorBuscadoView.php');
						}
						else{
							if($autor == FALSE)
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
						$autores_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($autores_array) ){
							//incluir vista
							include('Vista/Vista_Autor/AutorVistaView.php');
						}
						else{
							if($autores_array == FALSE)
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
						$autor = $this->modelo->eliminar($_REQUEST['id']);
						if($autor == TRUE){
							//incluir vista
							include('Vista/Vista_Autor/AutorEliminadoView.php');
						}
						else{
							if($autor == FALSE)
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
						$autor = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom']);
						if($autor == TRUE){
							//incluir vista
							include('Vista/Vista_Autor/AutorActualizadoView.php');
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
			$autores_array = $this->modelo->listar();

			if ( is_array($autores_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Autor/AutorVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$autores_array = $this->modelo->listar();

			if ( is_array($autores_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Autor/AutorVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}