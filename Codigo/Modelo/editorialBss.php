<?php

class editorialBss{

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
						editorial";
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
		require('editorialClass.php');
		//Por cada producto
		foreach($resultado as $editorial){
			$editoriales = new Editorial($editorial['id_editorial'], $editorial['nombre_editorial']);
			$lista_editoriales[] = $editoriales;
		}
		//Regreso los productos
		return $lista_editoriales;
	}

	function agregar($nombre_editorial){
		
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
								editorial(nombre_editorial)
								VALUES(
								'$nombre_editorial'
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
		require('editorialClass.php');
		$editorial = new Editorial($id, $nombre_editorial);
		//Regreso los productos
		return $editorial;
	}
	
	function buscar_id($id_editorial){
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
				editorial
				WHERE id_editorial='$id_editorial'";
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
			require('editorialClass.php');
			$editorial = new Editorial($resultado[0]['id_editorial'], $resultado[0]['nombre_editorial']);
			//Regreso los productos
			return $editorial;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($nombre_editorial){
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
					editorial
					WHERE nombre_editorial='$nombre_editorial'";
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
			require('editorialClass.php');
			//Por cada producto
			foreach($resultado as $editorial){
				$editoriales = new Editorial($editorial['id_editorial'], $editorial['nombre_editorial']);
				$lista_editoriales[] = $editoriales;
			}
			//Regreso los productos
			return $lista_editoriales;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_editorial){
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
					editorial
					WHERE(id_editorial='$id_editorial'
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
	
	function actualizar($id_editorial, $nombre_editorial){
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
					editorial
					SET nombre_editorial = '$nombre_editorial'
					WHERE id_editorial='$id_editorial'
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