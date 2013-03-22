<?php

class usuarioBss{

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
				usuario";

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

	function agregar($nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol){
		
		//cargo los datos para la conexion
		include ('usuarioClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
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

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		if($conexion -> affected_rows > 0){
			$usuario = new Usuario($conexion->insert_id, $nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol);
		}

		//cierro la conexion
		$conexion -> close();

		return $usuario;
	}
	
	function buscar_por_id($id_usuario){
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
				usuario
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
			$usuarios[]= $fila;

		//regreso los productos
		return $usuarios;
	}
	
	function buscar_por_nombre($nombre_usuario){
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
				usuario
				WHERE nombre_usuario='$nombre_usuario'";

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
			$usuarios[]= $fila;

		//regreso los productos
		return $usuarios;
	}
	
	function eliminar($id_usuario){
		
		//cargo los datos para la conexion
		include ('usuarioClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "DELETE FROM
				usuario
				WHERE(id_usuario='$id_usuario'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		//saber si se afecto algo
		$usuario = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();
		
		return $usuario;
	}
	
	function actualizar($id_usuario, $nombre_usuario, $nick_usuario, $clave, $apellido_usuario, $direccion_usuario, $telefono_usuario, $email_usuario, $genero_usuario, $id_rol){
		
		//cargo los datos para la conexion
		include ('usuarioClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
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

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		$usuario = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();

		return $usuario;
	}
	
	function login($nick_usuario, $clave){
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
				usuario
				WHERE nick_usuario='$nick_usuario' AND clave='$clave'";

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
			$usuarios[]= $fila;

		//regreso los productos
		return $usuarios;
	}
}