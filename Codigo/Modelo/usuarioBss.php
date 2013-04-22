<?php

class usuarioBss{

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
						usuario";
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
		require('usuarioClass.php');
		//Por cada producto
		foreach($resultado as $usuario){
			$usuarios = new Usuario($usuario['id_usuario'], $usuario['nombre_usuario'], $usuario['nick_usuario'], $usuario['clave'], $usuario['apellido_usuario'], $usuario['direccion_usuario'], $usuario['telefono_usuario'], $usuario['email_usuario'], $usuario['genero_usuario'], $usuario['id_rol']);
			$lista_usuarios[] = $usuarios;
		}
		//Regreso los productos
		return $lista_usuarios;
	}

	function agregar($nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol){
		
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
								usuario(nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol)
								VALUES(
								'$nombre_usuario',
								'$nick_usuario',
								'$clave',
								'$apellido_usuario',
								'$direccion_usuario',
								'$telefono_usuario',
								'$email_usuario',
								'$genero_usuario',
								$id_rol
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
		require('usuarioClass.php');
		$usuario = new Usuario($id, $nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol);
		//Regreso los productos
		return $usuario;
	}
	
	function buscar_id($id_usuario){
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
				usuario
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
		if($resultado == TRUE)
		{
			require('usuarioClass.php');
			$usuario = new Usuario($resultado[0]['id_usuario'], $resultado[0]['nombre_usuario'], $resultado[0]['nick_usuario'], $resultado[0]['clave'], $resultado[0]['apellido_usuario'], $resultado[0]['direccion_usuario'], $resultado[0]['telefono_usuario'], $resultado[0]['email_usuario'], $resultado[0]['genero_usuario'], $resultado[0]['id_rol']);
			//Regreso los productos
			return $usuario;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($nombre_usuario){
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
					usuario
					WHERE nombre_usuario='$nombre_usuario'";
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
			require('usuarioClass.php');
			//Por cada producto
			foreach($resultado as $usuario){
				$usuarios = new Usuario($usuario['id_usuario'], $usuario['nombre_usuario'], $usuario['nick_usuario'], $usuario['clave'], $usuario['apellido_usuario'], $usuario['direccion_usuario'], $usuario['telefono_usuario'], $usuario['email_usuario'], $usuario['genero_usuario'], $usuario['id_rol']);
				$lista_usuarios[] = $usuarios;
			}
			//Regreso los productos
			return $lista_usuarios;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_usuario){
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
					usuario
					WHERE(id_usuario='$id_usuario'
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
	
	function actualizar($id_usuario, $nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol){
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
					usuario
					SET nombre_usuario = '$nombre_usuario',
						nick_usuario = '$nick_usuario',
						clave = '$clave',
						apellido_usuario = '$apellido_usuario',
						direccion_usuario = '$direccion_usuario',
						telefono_usuario = '$telefono_usuario',
						email_usuario = '$email_usuario',
						genero_usuario = '$genero_usuario',
						id_rol = '$id_rol'
					WHERE id_usuario='$id_usuario'
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