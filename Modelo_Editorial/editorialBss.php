<?php

class editorialBss{

	//
	function listar(){
		//cargo los datos para la conexion

		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				editorial";

		//Ejecutar el query
		$resultado = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//cierro la conexion
		$conexion -> close();

		if(!$resultado->num_rows > 0)
			return FALSE;

		//procesamos el resultado para convertirlo en un array
		while ($fila = $resultado->fetch_assoc())
			$editoriales[]= $fila;

		//regreso los productos
		return $editoriales;
	}

	function agregar($nombre_editorial){
		
		//cargo los datos para la conexion
		include ('editorialClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				editorial(nombre_editorial)
				VALUES(
					'$nombre_editorial'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		if($conexion -> affected_rows > 0){
			$editorial = new Editorial($conexion->insert_id, $nombre_editorial);
		}

		//cierro la conexion
		$conexion -> close();

		return $editorial;
	}
}