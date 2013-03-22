<?php

class prestamoBss{

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
				prestamo";

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
			$prestamos[]= $fila;

		//regreso los productos
		return $prestamos;
	}

	function agregar($id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa){
		
		//cargo los datos para la conexion
		include ('prestamoClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				prestamo(id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa)
				VALUES(
					$id_usuario,
					'$fecha_prestamo',
					'$fecha_propuesta',
					'$fecha_entrega',
					'$multa'
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
			$prestamo = new Prestamo($conexion->insert_id, $id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa);
		}

		//cierro la conexion
		$conexion -> close();

		return $prestamo;
	}
	
	function buscar_por_id($id_prestamo){
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
				prestamo
				WHERE id_prestamo='$id_prestamo'";

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
			$prestamos[]= $fila;

		//regreso los productos
		return $prestamos;
	}
	
	function buscar_por_nombre($id_usuario){
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
				prestamo
				WHERE id_usuario='$id_usuario'";

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
			$prestamos[]= $fila;

		//regreso los productos
		return $prestamos;
	}
	
	function eliminar($id_prestamo){
		
		//cargo los datos para la conexion
		include ('prestamoClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "DELETE FROM
				prestamo
				WHERE(id_prestamo='$id_prestamo'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		//saber si se afecto algo
		$prestamo = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();
		
		return $prestamo;
	}
	
	function actualizar($id_prestamo, $id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa){
		
		//cargo los datos para la conexion
		include ('prestamoClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "UPDATE
				prestamo
				SET id_usuario = '$id_usuario',
					fecha_prestamo = '$fecha_prestamo',
					fecha_propuesta = '$fecha_propuesta',
					fecha_entrega = '$fecha_entrega',
					multa = '$multa'
				WHERE id_prestamo='$id_prestamo'
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		$prestamo = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();

		return $prestamo;
	}
}