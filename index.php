<?php 
	include_once('core/init.php'); // Incluimos el archivo init.php que contiene las instancias de las diferentes clases 
?>
<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Aqui toda nuestra descripcion">
	<meta name="keywords" content="Aqui, Palabras, Clave">
	<link rel="stylesheet" type="text/css" href="site_media/css/style.css"/>
	<title>Tienda PHP</title>
</head>
<body>
<?php
	if(isset($_POST["usuario"]) && ($_POST["password"])){ // Controlamos que se haya recibido algo por POST
		if(($_POST["usuario"]=="elmer") && ($_POST["password"]=="garcia")) { // En este caso verificamos que el nombre recibido por POST sea 'elmer' y la contraseña 'garcia'
		
			if(!$mi_sesion->comprobarSesion("usuario")==TRUE){ // Comprobamos la existencia de la sesion 'usuario'
			
			$mi_sesion->agregarSesion(array("usuario"=>$_POST["usuario"],"password"=>$_POST["password"])); // Posteriormente la creamos en caso que no exista
			
			header("Location: tienda.php"); // Redirrecionamos con exito al perfil de la tienda del usuario
			}		
		}else{
			header( "Location: index.php?error=1" ); // En caso contrario volvemos al index
		}
	}
?>
					<?php
					
					$tag->openTag("div","contenedor","",""); // '$tag' es el objeto instanciado de la clase que nos permite crear elementos html como divs,label, echo, etc
					
					$cabecera->agregarCabecera('TIENDA ONLINE','center','#FF1A00','#FFF','');
					$cabecera->mostrar();	
					
					$tag->openTag("div","contenido","","");
						
					$tag->openTag("div","section_l","","");				
						
					if(!$mi_sesion->getValor("usuario")){ // Verificamos que el usuario haya iniciado sesion, en caso contrario mostramos el formulario

						$form->startForm("index.php","POST","form-logeo", array('name'=>'form1','class'=>'generic','enctype'=>'', 'onsubmit'=>'')); // Abrimos el formulario 
						
						$tag->openTag("label","","",array("for"=>"usuario")); 
						$tag->output("Usuario: "); 
						$tag->closeTag("label");						
						$input->addInput("text","usuario","",array("id"=>"usuario","placeholder"=>"elmer",'class'=>'text','size'=>16, "required"=>"required"));
						
						$tag->openTag("label","","",array("for"=>"password"));		
						$tag->output("Password: ");
						$tag->closeTag("label");	
						$input->addInput("password","password","",array("id"=>"password","placeholder"=>"garcia",'class'=>'text','size'=>16,"required"=>"required"));
							
						$input->addInput("submit","","Enviar",array('id'=>'login-submit'));
						// En caso de no introducir correctamente los datos del formulario mostramos el error	
						if (isset($_GET['error'])==1) {
							$tag->output("<b>Usuario o clave incorrecta</b>");
						}
						// Creamos y mostramos los enlaces creados	
						$menu->cargarEnlace('registro.php','Todavia no te has dado de alta?','registro'); 
						$menu->mostrarHorizontal();		
							
						$form->endForm(); // Cerramos el formulario
					
                    }else{ // Si inicio sesion restringimos el acceso posterior al formulario redirreccionandolo a la 'tienda'
							header("location: tienda.php");
                    }
					
					$tag->closeTag("div");
					
					$tag->closeTag("div");
					// Agregamos y luego mostramos el footer de nuestra pagina
					$footer-> agregarFooter('Desarrollado por Elmer Garcia Yavi - 2013', 'center','#00000','transparent');
					$footer->mostrar();
						
					$tag->closeTag("div");
					
                    ?>
</body>
</html>