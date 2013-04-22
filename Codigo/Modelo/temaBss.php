<?php

class temaBss{

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
						tema";
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
		require('temaClass.php');
		//Por cada producto
		foreach($resultado as $tema){
			$temas = new Tema($tema['id_tema'], $tema['nombre_tema']);
			$lista_temas[] = $temas;
		}
		//Regreso los productos
		return $lista_temas;
	}

	function agregar($nombre_tema){
		
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
								tema(nombre_tema)
								VALUES(
								'$nombre_tema'
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
		require('temaClass.php');
		$tema = new Tema($id, $nombre_tema);
		//Regreso los productos
		return $tema;
	}
	
	function buscar_id($id_tema){
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
				tema
				WHERE id_tema='$id_tema'";
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
			require('temaClass.php');
			$tema = new Tema($resultado[0]['id_tema'], $resultado[0]['nombre_tema']);
			//Regreso los productos
			return $tema;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($nombre_tema){
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
					tema
					WHERE nombre_tema='$nombre_tema'";
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
			require('temaClass.php');
			//Por cada producto
			foreach($resultado as $tema){
				$temas = new Tema($tema['id_tema'], $tema['nombre_tema']);
				$lista_temas[] = $temas;
			}
			//Regreso los productos
			return $lista_temas;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_tema){
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
					tema
					WHERE(id_tema='$id_tema'
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
	
	function actualizar($id_tema, $nombre_tema){
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
					tema
					SET nombre_tema = '$nombre_tema'
					WHERE id_tema='$id_tema'
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