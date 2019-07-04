<?php
	// Incluimos los diferentes archivos y clases
	include_once('lib_carrito.php');
	include_once('../includes/cabecera.php');
	include_once('../includes/footer.php');
	include_once('../core/init.php');
	
	if($mi_sesion->getValor("usuario")==TRUE){ // Verificamos que el usuario haya iniciado sesion
	if($_GET["cantidad"]==NULL){ // Si la cantidad es nula la definimos por defecto a 1
		$_GET["cantidad"]=1;
	} // Introducimos los productos al carrito de acuerdo a los valores pasados por GET de cada uno de ellos
		$_SESSION["ocarrito"]->introducirProducto($_GET["id"],$_GET["nombre"],$_GET["descripcion"],$_GET["categoria"],$_GET["precio"],$_GET["imagen"],$_GET["cantidad"]);
		header("location: ../tienda.php");

	}else{ // Si no ha iniciado sesion restringimos el acceso al perfil de la tienda redirrecionandolo al index
		header("location:../index.php");
	}
?>
