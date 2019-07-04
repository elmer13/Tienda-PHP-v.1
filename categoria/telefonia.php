<?php 
	// Incluimos los diferentes archivos y clases
	include_once('../includes/cabecera.php');
	include_once('../includes/footer.php');
	include_once('../carrito/lib_carrito.php');
	include_once('../core/init.php'); 

	if($mi_sesion->getValor("usuario")==TRUE){ // Verificamos que el usuario haya iniciado sesion

?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Aqui toda nuestra descripcion">
	<meta name="keywords" content="Aqui, Palabras, Clave">
	<link rel="stylesheet" type="text/css" href="../site_media/css/style.css"/>
	<title>Tienda PHP</title>
</head>
<body>
					<?php

					$tag->openTag("div","contenedor","",""); // '$tag' es el objeto instanciado de la clase que nos permite crear elementos html como divs,label, echo, etc
					// Agregamos y mostramos la cabecera de nuestra pagina donde aparece el nombre del usuario						
					$cabecera->agregarCabecera("BIENVENIDO ".$_SESSION['usuario'].'','left','#FF1A00','#FBCC5D','../site_media/img/tienda-online.png');
					$cabecera->mostrar();	
					// Creamos y mostramos los enlaces creados						
					$menu->cargarEnlace('../tienda.php','Home','menu');
					$menu->cargarEnlace('informatica.php','Informática','menu');
					$menu->cargarEnlace('telefonia.php','Telefonía','menu');
					$menu->cargarEnlace('fotografia.php','Fotografía','menu');
					$menu->cargarEnlace('videojuegos.php','Videojuegos','menu');
					$menu->cargarEnlace('../cerrar_sesion.php','Cerrar sesión','menu');
					$menu->cargarEnlace('../carrito/ver_carrito.php','Ver carrito','menu');
					$menu->mostrarHorizontal();		

					$tag->openTag("div","item","","");
					if($_SESSION['ocarrito']->cantidadProducto()==""){ // Si el carrito esta vacio lo indicamos
						$tag->output("Vacio [0]");
					}else{ // En caso contrario mostramos la cantidad de productos  que va añadiendo el usuario
						$tag->output("Productos: ".$_SESSION['ocarrito']->cantidadProducto());
					}
					$tag->closeTag("div");
					
					$tag->openTag("div","contenido","","");
						
					$tag->openTag("div","section_l","","");			

						$productos->mostrarPorCategoria("Telefonía"); // Mostramos los productos creados que tengan la categoria 'Telefonía'
					
                    $tag->closeTag("div");
						
					$tag->closeTag("div");
					// Agregamos y luego mostramos el footer de nuestra pagina
					$footer-> agregarFooter('Desarrollado por Elmer Garcia Yavi - 2013', 'center','#00000','transparent');
					$footer->mostrar();
						
					$tag->closeTag("div");
					
					?>
</body>
</html>
<?php
}else{ // Si no ha iniciado sesion restringimos el acceso al perfil de la tienda redirrecionandolo al index
	header("location:../index.php");
}
?>