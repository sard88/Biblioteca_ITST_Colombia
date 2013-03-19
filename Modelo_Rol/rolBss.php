<?php

class rolBss{

	//
	function listar(){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				rol";

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
			$roles[]= $fila;

		//regreso los productos
		return $roles;
	}

	function agregar($nombre_rol){
		
		//cargo los datos para la conexion
		include ('rolClass.php');
		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				rol(nombre_rol)
				VALUES(
					'$nombre_rol'
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
			$rol = new Rol($conexion->insert_id, $nombre_rol);
		}

		//cierro la conexion
		$conexion -> close();

		return $rol;
	}
	
	function buscar_por_id($id_rol){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				rol
				WHERE id_rol='$id_rol'";

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
			$roles[]= $fila;

		//regreso los productos
		return $roles;
	}
	
	function buscar_por_nombre($nombre_rol){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				rol
				WHERE nombre_rol='$nombre_rol'";

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
			$roles[]= $fila;

		//regreso los productos
		return $roles;
	}
	
	function eliminar($id_rol){
		
		//cargo los datos para la conexion
		include ('rolClass.php');
		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "DELETE FROM
				rol
				WHERE(id_rol='$id_rol'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		//saber si se afecto algo
		$rol = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();
		
		return $rol;
	}
	
	function actualizar($id_rol, $nombre_rol){
		
		//cargo los datos para la conexion
		include ('rolClass.php');
		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "UPDATE
				rol
				SET nombre_rol = '$nombre_rol'
				WHERE id_rol='$id_rol'
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		$rol = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();

		return $rol;
	}
}