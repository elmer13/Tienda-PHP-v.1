<?php 
	include_once('core/init.php'); // Incluimos el archivo init.php que contiene las instancias de las diferentes clases 
	$mi_sesion->borrarSesion("usuario"); // Borramos la sesion en este caso 'usuario'
	header("location: index.php"); // Redireccionamos al index.php
?>