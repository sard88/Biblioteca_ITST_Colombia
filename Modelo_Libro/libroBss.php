<?php

class libroBss{

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
				libro";

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
			$libros[]= $fila;

		//regreso los productos
		return $libros;
	}

	function agregar($nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro){
		
		//cargo los datos para la conexion
		include ('libroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				libro(nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro)
				VALUES(
					'$nombre_libro',
					'$paginas_libro',
					'$codigo_libro',
					'$version_libro',
					'$id_editorial',
					'$id_estado_libro'
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
			$libro = new Libro($conexion->insert_id, $nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro);
		}

		//cierro la conexion
		$conexion -> close();

		return $libro;
	}
	
	function buscar_por_id($id_libro){
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
				libro
				WHERE id_libro='$id_libro'";

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
			$libros[]= $fila;

		//regreso los productos
		return $libros;
	}
	
	function buscar_por_nombre($nombre_libro){
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
				libro
				WHERE nombre_libro='$nombre_libro'";

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
			$libros[]= $fila;

		//regreso los productos
		return $libros;
	}
	
	function eliminar($id_libro){
		
		//cargo los datos para la conexion
		include ('libroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "DELETE FROM
				libro
				WHERE(id_libro='$id_libro'
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		//saber si se afecto algo
		$libro = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();
		
		return $libro;
	}
	
	function actualizar($id_libro, $nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro){
		
		//cargo los datos para la conexion
		include ('libroClass.php');
		include ('Modelo_Rol/data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "UPDATE
				libro
				SET nombre_libro = '$nombre_libro',
					paginas_libro = '$paginas_libro',
					codigo_libro = '$codigo_libro',
					version_libro = '$version_libro',
					id_editorial = '$id_editorial',
					id_estado_libro = '$id_estado_libro'
				WHERE id_libro='$id_libro'
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		$libro = mysqli_affected_rows($conexion);
		//cierro la conexion
		$conexion -> close();

		return $libro;
	}
}