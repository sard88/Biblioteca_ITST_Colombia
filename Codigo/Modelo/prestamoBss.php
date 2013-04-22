<?php

class prestamoBss{

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
						prestamo";
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
		require('prestamoClass.php');
		//Por cada producto
		foreach($resultado as $prestamo){
			$prestamos = new Prestamo($prestamo['id_prestamo'], $prestamo['id_usuario'], $prestamo['fecha_prestamo'], $prestamo['fecha_propuesta'], $prestamo['fecha_entrega'], $prestamo['multa']);
			$lista_prestamos[] = $prestamos;
		}
		//Regreso los productos
		return $lista_prestamos;
	}

	function agregar($id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa){
		
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
					prestamo(id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa)
					VALUES(
						$id_usuario,
						'$fecha_prestamo',
						'$fecha_propuesta',
						'$fecha_entrega',
						'$multa'
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
		require('prestamoClass.php');
		$prestamo = new Prestamo($id, $id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa);
		//Regreso los productos
		return $prestamo;
	}
	
	function buscar_id($id_prestamo){
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
				prestamo
				WHERE id_prestamo='$id_prestamo'";
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
			require('prestamoClass.php');
			$prestamo = new Prestamo($resultado[0]['id_prestamo'], $resultado[0]['id_usuario'], $resultado[0]['fecha_prestamo'], $resultado[0]['fecha_propuesta'], $resultado[0]['fecha_entrega'], $resultado[0]['multa']);
			//Regreso los productos
			return $prestamo;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($id_usuario){
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
					prestamo
					WHERE id_usuario='$id_usuario'";
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
			require('prestamoClass.php');
			//Por cada producto
			foreach($resultado as $prestamo){
				$prestamos = new Prestamo($prestamo['id_prestamo'], $prestamo['id_usuario'], $prestamo['fecha_prestamo'], $prestamo['fecha_propuesta'], $prestamo['fecha_entrega'], $prestamo['multa']);
				$lista_prestamos[] = $prestamos;
			}
			//Regreso los productos
			return $lista_prestamos;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_prestamo){
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
					prestamo
					WHERE(id_prestamo='$id_prestamo'
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
	
	function actualizar($id_prestamo, $id_usuario, $fecha_prestamo, $fecha_propuesta, $fecha_entrega, $multa){
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
					prestamo
					SET id_usuario = '$id_usuario',
						fecha_prestamo = '$fecha_prestamo',
						fecha_propuesta = '$fecha_propuesta',
						fecha_entrega = '$fecha_entrega',
						multa = '$multa'
					WHERE id_prestamo='$id_prestamo'
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