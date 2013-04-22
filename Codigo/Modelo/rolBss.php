<?php

class rolBss{

	//
	function listar(){
		//cargo los datos para la conexion

		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "SELECT
						*
					 FROM
						rol";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$conexion -> cerrar();
		//Proceso el arreglo para convertirlo
		//en una colección de objetos de tipo
		//producto.
		require('rolClass.php');
		//Por cada producto
		foreach($resultado as $rol){
			$roles = new Rol($rol['id_rol'], $rol['nombre_rol']);
			$lista_roles[] = $roles;
		}
		//Regreso los productos
		return $lista_roles;
	}

	function agregar($nombre_rol){
		
		//cargo los datos para la conexion
		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "INSERT INTO
								rol(nombre_rol)
								VALUES(
								'$nombre_rol'
								)
								";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$id = $resultado;
		$conexion -> cerrar();
		require('rolClass.php');
		$rol = new Rol($id, $nombre_rol);
		//Regreso los productos
		return $rol;
	}
	
	function buscar_id($id_rol){
		//cargo los datos para la conexion
		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "SELECT
				*
				FROM
				rol
				WHERE id_rol='$id_rol'";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$conexion -> cerrar();
		if($resultado == TRUE)
		{
			require('rolClass.php');
			$rol = new Rol($resultado[0]['id_rol'], $resultado[0]['nombre_rol']);
			//Regreso los productos
			return $rol;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($nombre_rol){
		//cargo los datos para la conexion

		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "SELECT
					*
					FROM
					rol
					WHERE nombre_rol='$nombre_rol'";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$conexion -> cerrar();
		//Proceso el arreglo para convertirlo
		//en una colección de objetos de tipo
		//producto.
		if($resultado == TRUE)
		{
			require('rolClass.php');
			//Por cada producto
			foreach($resultado as $rol){
				$roles = new Rol($rol['id_rol'], $rol['nombre_rol']);
				$lista_roles[] = $roles;
			}
			//Regreso los productos
			return $lista_roles;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_rol){
		//cargo los datos para la conexion

		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "DELETE FROM
					rol
					WHERE(id_rol='$id_rol'
						)
						";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$conexion -> cerrar();
		if($resultado == TRUE)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	function actualizar($id_rol, $nombre_rol){
		//cargo los datos para la conexion

		include 'data_bd.inc';
		include 'databaseClass.php';
		//creo mi cadena de conexion
		$conexion = new DB($host, $user, $pass, $bd);
		//Creo mi conexión
		$status = $conexion->conectar();
		//En caso de que devuelva una falla
		if($status === FALSE){
			die('No se pudo conectar');
		}
		//Creo mi query
		$consulta = "UPDATE
					rol
					SET nombre_rol = '$nombre_rol'
					WHERE id_rol='$id_rol'
						";
		//Ejecuto la consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);
		//Si fue una falla
		if($conexion === FALSE){
			$conexion -> cerrar();	
			return FALSE;
		}
		//Cierro la conexion
		$conexion -> cerrar();
		if($resultado == TRUE)
			{
				return TRUE;
			}
		else {
			return FALSE;
		}
	}
}