<?php

class estandarCtl_Libro{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/libroBss.php');

		//creo el objeto de modelo
		$this->modelo = new libroBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']) && isset($_REQUEST['pag']) && isset($_REQUEST['cod']) && isset($_REQUEST['ver']) && isset($_REQUEST['edi']) && isset($_REQUEST['est']))
					{
						$libro = $this->modelo->agregar($_REQUEST['nom'],$_REQUEST['pag'],$_REQUEST['cod'],$_REQUEST['ver'],$_REQUEST['edi'],$_REQUEST['est']);
						if(is_object($libro)){
							//incluir vista
							include('Vista/Vista_Libro/LibroAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar los datos completos del libro';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$libro = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($libro)){
							//incluir vista
							include('Vista/Vista_Libro/LibroBuscadoView.php');
						}
						else{
							if($libro == FALSE)
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
						$libros_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($libros_array) ){
							//incluir vista
							include('Vista/Vista_Libro/LibroVistaView.php');
						}
						else{
							if($libros_array == FALSE)
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
						$libro = $this->modelo->eliminar($_REQUEST['id']);
						if($libro == TRUE){
							//incluir vista
							include('Vista/Vista_Libro/LibroEliminadoView.php');
						}
						else{
							if($libro == FALSE)
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
				if(isset($_REQUEST['id']) && isset($_REQUEST['nom']) && isset($_REQUEST['pag']) && isset($_REQUEST['cod']) && isset($_REQUEST['ver']) && isset($_REQUEST['edi']) && isset($_REQUEST['est']))
					{
						$libro = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom'],$_REQUEST['pag'],$_REQUEST['cod'],$_REQUEST['ver'],$_REQUEST['edi'],$_REQUEST['est']);
						if($libro == TRUE){
							//incluir vista
							include('Vista/Vista_Libro/LibroActualizadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo actualizar';
						}
					}
					else {
						echo 'Debe ingresar un id valido y/o los datos completos para actualizar';
					}
				break;
				
			default :
			$libros_array = $this->modelo->listar();

			if ( is_array($libros_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Libro/LibroVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$libros_array = $this->modelo->listar();

			if ( is_array($libros_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Libro/LibroVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}