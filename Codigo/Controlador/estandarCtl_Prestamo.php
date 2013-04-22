<?php

class estandarCtl_Prestamo{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/prestamoBss.php');

		//creo el objeto de modelo
		$this->modelo = new prestamoBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['usu']) && isset($_REQUEST['fepre']) && isset($_REQUEST['fepro']) && isset($_REQUEST['feent']) && isset($_REQUEST['mul']))
					{
						$prestamo = $this->modelo->agregar($_REQUEST['usu'],$_REQUEST['fepre'], $_REQUEST['fepro'], $_REQUEST['feent'], $_REQUEST['mul']);
						if(is_object($prestamo)){
							//incluir vista
							include('Vista/Vista_Prestamo/PrestamoAgregadoView.php');
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
						$prestamo = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($prestamo)){
							//incluir vista
							include('Vista/Vista_Prestamo/PrestamoBuscadoView.php');
						}
						else{
							if($prestamo == FALSE)
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
						$prestamos_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($prestamos_array) ){
							//incluir vista
							include('Vista/Vista_Prestamo/PrestamoVistaView.php');
						}
						else{
							if($prestamos_array == FALSE)
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
						$prestamo = $this->modelo->eliminar($_REQUEST['id']);
						if($prestamo == TRUE){
							//incluir vista
							include('Vista/Vista_Prestamo/PrestamoEliminadoView.php');
						}
						else{
							if($prestamo == FALSE)
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
				if(isset($_REQUEST['id']) && ($_REQUEST['usu']) && isset($_REQUEST['fepre']) && isset($_REQUEST['fepro']) && isset($_REQUEST['feent']) && isset($_REQUEST['mul']))
					{
						$prestamo = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['usu'],$_REQUEST['fepre'], $_REQUEST['fepro'], $_REQUEST['feent'], $_REQUEST['mul']);
						if($prestamo == TRUE){
							//incluir vista
							include('Vista/Vista_Prestamo/PrestamoActualizadoView.php');
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
			$prestamos_array = $this->modelo->listar();

			if ( is_array($prestamos_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Prestamo/PrestamoVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$prestamos_array = $this->modelo->listar();

			if ( is_array($prestamos_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Prestamo/PrestamoVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}