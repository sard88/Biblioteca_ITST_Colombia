<?php

class libroBss{

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
						libro";
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
		require('libroClass.php');
		//Por cada producto
		foreach($resultado as $libro){
			$libros = new Libro($libro['id_libro'], $libro['nombre_libro'], $libro['paginas_libro'], $libro['codigo_libro'], $libro['version_libro'], $libro['id_editorial'], $libro['id_estado_libro']);
			$lista_libros[] = $libros;
		}
		//Regreso los productos
		return $lista_libros;
	}

	function agregar($nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro){
		
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
								libro(nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro)
								VALUES(
								'$nombre_libro',
								'$paginas_libro',
								'$codigo_libro',
								'$version_libro',
								$id_editorial,
								$id_estado_libro
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
		require('libroClass.php');
		$libro = new Libro($id, $nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro);
		//Regreso los productos
		return $libro;
	}
	
	function buscar_id($id_libro){
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
				libro
				WHERE id_libro='$id_libro'";
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
			require('libroClass.php');
			$libro = new Libro($resultado[0]['id_libro'], $resultado[0]['nombre_libro'], $resultado[0]['paginas_libro'], $resultado[0]['codigo_libro'], $resultado[0]['version_libro'], $resultado[0]['id_editorial'], $resultado[0]['id_estado_libro']);
			//Regreso los productos
			return $libro;
		}
		else {
			return FALSE;
		}
		
	}
	
	function buscar_nombre($nombre_libro){
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
					libro
					WHERE nombre_libro='$nombre_libro'";
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
			require('libroClass.php');
			//Por cada producto
			foreach($resultado as $libro){
				$libros = new Libro($libro['id_libro'], $libro['nombre_libro'], $libro['paginas_libro'], $libro['codigo_libro'], $libro['version_libro'], $libro['id_editorial'], $libro['id_estado_libro']);
				$lista_libros[] = $libros;
			}
			//Regreso los productos
			return $lista_libros;
		}
		else {
			return FALSE;
		}
	}
	
	function eliminar($id_libro){
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
					libro
					WHERE(id_libro='$id_libro'
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
	
	function actualizar($id_libro, $nombre_libro, $paginas_libro, $codigo_libro, $version_libro, $id_editorial, $id_estado_libro){
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
					libro
					SET nombre_libro = '$nombre_libro',
						paginas_libro = '$paginas_libro',
						codigo_libro = '$codigo_libro',
						version_libro = '$version_libro',
						id_editorial = '$id_editorial',
						id_estado_libro = '$id_estado_libro'
					WHERE id_libro='$id_libro'
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