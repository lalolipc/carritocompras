<?php namespace ControladoraL;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');
require('..\Config\Config.php');

use Config\Autoload as Autoload;
use Modelo\Empleado as Empleado;
use Modelo\JefeDepto as JefeDepto;
use Modelo\Encargado as Encargado;
use Modelo\Personal as Personal;

Autoload::Start();

session_start();

if (isset($_POST['LimpiarLista'])) {
	$_SESSION['Personal'] = new Personal();
	echo "<script> if(confirm('Se limpio la Lista de Empleados!'));";  
		echo "window.location = '../index.php'; </script>";
}

if(isset($_POST['btnEliminar'])){
	$EliminarLeg = $_POST['btnEliminar'];
	$_SESSION['Personal']->Eliminar($EliminarLeg);
	echo "<script> if(confirm('El Empleado ha sido Eliminado Correctamente!'));";  
		echo "window.location = '../public_html/Consultas.php'; </script>";
}


?>