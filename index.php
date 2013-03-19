<?php
    //cargo de informacion del controlador

include('Controlador_Rol/estandarCtl_Rol.php');
include('Controlador_Editorial/estandarCtl_Editorial.php');
include('Controlador_Tema/estandarCtl_Tema.php');
include('Controlador_Autor/estandarCtl_Autor.php');
include('Controlador_Estadolibro/estandarCtl_Estadolibro.php');
include('Controlador_Usuario/estandarCtl_Usuario.php');
include('Controlador_Prestamo/estandarCtl_Prestamo.php');
include('Controlador_Libro/estandarCtl_Libro.php');

if(!isset($_REQUEST['controlador'])){
			echo 'Debe seleccionar 1 opcion :)';
			
		}
if($_REQUEST['controlador']=='rol'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Rol();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='editorial'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Editorial();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='tema'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Tema();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='autor'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Autor();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='estadolibro'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Estadolibro();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='usuario'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Usuario();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='prestamo'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Prestamo();
			$controlador -> ejecutar();
		}
if($_REQUEST['controlador']=='libro'){
			//creo controlador y lo ejecuto
			$controlador = new estandarCtl_Libro();
			$controlador -> ejecutar();
		}
?>
