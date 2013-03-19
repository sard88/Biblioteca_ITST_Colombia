<?php

class estadolibroBss{

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
				estadolibro";

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
			$estadolibros[]= $fila;

		//regreso los productos
		return $estadolibros;
	}

	function agregar($nombre_estado_libro){
		
		//cargo los datos para la conexion
		include ('estadolibroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				estadolibro(nombre_estado_libro)
				VALUES(
					'$nombre_estado_libro'
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
			$estadolibro = new Estadolibro($conexion->insert_id, $nombre_estado_libro);
		}

		//cierro la conexion
		$conexion -> close();

		return $estadolibro;
	}
	
	function buscar_por_id($id_estado_libro){
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
				estadolibro
				WHERE id_estado_libro='$id_estado_libro'";

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
			$estadolibros[]= $fila;

		//regreso los productos
		return $estadolibros;
	}
	
	function buscar_por_nombre($nombre_estado_libro){
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
				estadolibro
				WHERE nombre_estado_libro='$nombre_estado_libro'";

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
			$estadolibros[]= $fila;

		//regreso los productos
		return $estadolibros;
	}
	
	function eliminar($id_estado_libro){
		
		//cargo los datos para la conexion
		include ('estadolibroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "DELETE FROM
				estadolibro
				WHERE(id_estado_libro='$id_estado_libro'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		//saber si se afecto algo
		$estadolibro = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();
		
		return $estadolibro;
	}
	
	function actualizar($id_estado_libro, $nombre_estado_libro){
		
		//cargo los datos para la conexion
		include ('estadolibroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "UPDATE
				estadolibro
				SET nombre_estado_libro = '$nombre_estado_libro'
				WHERE id_estado_libro='$id_estado_libro'
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		$estadolibro = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();

		return $estadolibro;
	}
}