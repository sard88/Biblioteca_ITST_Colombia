<?php

//Creamos el contralador en base a lo requerido y lo mandamos a ejecutar
if (isset($_REQUEST['controlador'])) {

	switch($_REQUEST['controlador']) {
		case 'rol' :
			include ('Controlador/estandarCtl_Rol.php');
			$controlador = new estandarCtl_Rol();
			break;
		case 'editorial' :
			include ('Controlador/estandarCtl_Editorial.php');
			$controlador = new estandarCtl_Editorial();
			break;
		case 'tema' :
			include ('Controlador/estandarCtl_Tema.php');
			$controlador = new estandarCtl_Tema();
			break;

		case 'autor' :
			include ('Controlador/estandarCtl_Autor.php');
			$controlador = new estandarCtl_Autor();
			break;
		case 'estadolibro' :
			include ('Controlador/estandarCtl_Estadolibro.php');
			$controlador = new estandarCtl_Estadolibro();
			break;
		case 'usuario' :
			include ('Controlador/estandarCtl_Usuario.php');
			$controlador = new estandarCtl_Usuario();
			break;
		case 'prestamo' :
			include ('Controlador/estandarCtl_Prestamo.php');
			$controlador = new estandarCtl_Prestamo();
			break;
		case 'libro' :
			include ('Controlador/estandarCtl_Libro.php');
			$controlador = new estandarCtl_Libro();
			break;

		case 'estandar' :
			include ('Controlador/stdCtl.php');
			$controlador = new stdCtl();
			break;

		default :
			//carga el controlador estandar
			include ("Controlador/stdCtl.php");
			$controlador = new stdCtl();
			break;
	}

} else {
	include ("Controlador/stdCtl.php");
	$controlador = new stdCtl();

}
//Ejecutamos el controlador
$controlador -> ejecutar();
?>