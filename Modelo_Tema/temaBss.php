<?php

class temaBss{

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
				tema";

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
			$temas[]= $fila;

		//regreso los productos
		return $temas;
	}

	function agregar($nombre_tema){
		
		//cargo los datos para la conexion
		include ('temaClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				tema(nombre_tema)
				VALUES(
					'$nombre_tema'
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
			$tema = new Tema($conexion->insert_id, $nombre_tema);
		}

		//cierro la conexion
		$conexion -> close();

		return $tema;
	}
}