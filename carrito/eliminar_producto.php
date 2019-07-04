<?php
	// Incluimos los diferentes archivos y clases
	include_once('lib_carrito.php');
	include_once('../includes/cabecera.php');
	include_once('../includes/footer.php');
	include_once('../core/init.php');
	
	if($mi_sesion->getValor("usuario")==TRUE){ // Verificamos que el usuario haya iniciado sesion
		$_SESSION["ocarrito"]->eliminarProducto($_GET["linea"]); // Posteriormente elimino el producto determinado de la sesión
		header("location: ver_carrito.php"); // Redireccionamos con exito al carrito
	}else{ // Si no ha iniciado sesion restringimos el acceso al perfil de la tienda redirrecionandolo al index
		header("location:../index.php");
	}
?>
