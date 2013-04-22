<?php

class estandarCtl_Usuario{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('Modelo/usuarioBss.php');

		//creo el objeto de modelo
		$this->modelo = new usuarioBss();
	}

	function ejecutar(){
		if (isset($_REQUEST['accion'])) {
			switch($_REQUEST['accion']) {
			case 'agregar' :
				if(isset($_REQUEST['nom']) && isset($_REQUEST['nic']) && isset($_REQUEST['cla']) && isset($_REQUEST['ape']) && isset($_REQUEST['dir']) && isset($_REQUEST['tel']) && isset($_REQUEST['ema']) && isset($_REQUEST['gen']) && isset($_REQUEST['rol']))
					{
						$usuario = $this->modelo->agregar($_REQUEST['nom'],$_REQUEST['nic'],$_REQUEST['cla'],$_REQUEST['ape'],$_REQUEST['dir'],$_REQUEST['tel'],$_REQUEST['ema'],$_REQUEST['gen'],$_REQUEST['rol']);
						if(is_object($usuario)){
							//incluir vista
							include('Vista/Vista_Usuario/UsuarioAgregadoView.php');
						}
						else{
							//mando a llamar la lista de errores
							echo 'No se pudo agregar';
						}
					}
					else {
						echo 'Debe ingresar los datos completos del usuario';
					}
				break;
			
			case 'buscar_id' :
				if(isset($_REQUEST['id']))
					{
						$usuario = $this->modelo->buscar_id($_REQUEST['id']);
						if(is_object($usuario)){
							//incluir vista
							include('Vista/Vista_Usuario/UsuarioBuscadoView.php');
						}
						else{
							if($usuario == FALSE)
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
						$usuarios_array = $this->modelo->buscar_nombre($_REQUEST['nom']);
						if(is_array($usuarios_array) ){
							//incluir vista
							include('Vista/Vista_Usuario/UsuarioVistaView.php');
						}
						else{
							if($usuarios_array == FALSE)
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
						$usuario = $this->modelo->eliminar($_REQUEST['id']);
						if($usuario == TRUE){
							//incluir vista
							include('Vista/Vista_Usuario/UsuarioEliminadoView.php');
						}
						else{
							if($usuario == FALSE)
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
				if(isset($_REQUEST['id']) && isset($_REQUEST['nom']) && isset($_REQUEST['nic']) && isset($_REQUEST['cla']) && isset($_REQUEST['ape']) && isset($_REQUEST['dir']) && isset($_REQUEST['tel']) && isset($_REQUEST['ema']) && isset($_REQUEST['gen']) && isset($_REQUEST['rol']))
					{
						$usuario = $this->modelo->actualizar($_REQUEST['id'], $_REQUEST['nom'],$_REQUEST['nic'],$_REQUEST['cla'],$_REQUEST['ape'],$_REQUEST['dir'],$_REQUEST['tel'],$_REQUEST['ema'],$_REQUEST['gen'],$_REQUEST['rol']);
						if($usuario == TRUE){
							//incluir vista
							include('Vista/Vista_Usuario/UsuarioActualizadoView.php');
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
			$usuarios_array = $this->modelo->listar();

			if ( is_array($usuarios_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Usuario/UsuarioVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
			break;
			}
		}
		else {
			$usuarios_array = $this->modelo->listar();

			if ( is_array($usuarios_array) ){
				//Incluir la vista para listar
				include('Vista/Vista_Usuario/UsuarioVistaView.php');
			}
			else{
				//Mando a llamar la vista de errores
				die('No hay datos');
			}
		}
	}
}