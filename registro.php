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
	if(isset($_POST["usuario"]) && ($_POST["password"])){  // Controlamos que se haya recibido algo por POST
		if(($_POST["usuario"]=="elmer") && ($_POST["password"]=="garcia")) { // En este caso verificamos que el nombre recibido por POST sea 'elmer' y la contraseña 'garcia'
			
			header("Location: registro.php?correct=1"); // Posteriormente indicamos al usuario que se registro con existo
					
		}else{
			header( "Location: registro.php?error=1" ); // En caso contrario le indicamos que ha cometido un error
		}
	}
?>
					<?php
					
					$tag->openTag("div","contenedor","",""); // '$tag' es el objeto instanciado de la clase que nos permite crear elementos html como divs,label, echo, etc
					// Agregamos y mostramos la cabecera de nuestra pagina
					$cabecera->agregarCabecera('TIENDA ONLINE','center','#FF1A00','#FFF','');
					$cabecera->mostrar();	
					
					$tag->openTag("div","contenido","","");
						
					$tag->openTag("div","section_l","myform","");				
						
					if(!$mi_sesion->getValor("usuario")){ // Verificamos que el usuario haya iniciado sesion, en caso contrario mostramos el formulario

						$form->startForm("registro.php","POST","form",array("class"=>"formy")); // Abrimos el formulario
							
						$form->openfieldset("Registrarse",500); 
							
						$tag->openTag("div","","","");
						$tag->openTag("label","","",array("for"=>"usuario"));	
						$tag->output("Usuario* : ");
						$tag->closeTag("label");
						$input->addInput("text","usuario","",array("id"=>"usuario","placeholder"=>"elmer","required"=>"required"));
						$tag->closeTag("div");
							
						$tag->openTag("div","","","");
						$tag->openTag("label","","",array("for"=>"password"));	
						$tag->output("Password* : ");
						$tag->closeTag("label");
						$input->addInput("password","password","",array("id"=>"password","placeholder"=>"garcia","required"=>"required"));
						$tag->closeTag("div");
							
						$tag->openTag("div","","","");						
						$tag->openTag("label","","",array("for"=>"paises"));	
						$tag->output("Pais: ");
						$tag->closeTag("label");
						$valores=array("bol"=>"Bolivia","esp"=>"España","otros"=>"otros");
						$form->addSelect("paises", $valores,0);
						$tag->closeTag("div");
							
						$tag->openTag("div","","","");
						$tag->openTag("label","","",array("for"=>"descripcion"));	
						$tag->output("Descripción: ");
						$tag->closeTag("label");
						$form->addTextarea("descripcion",4,30,"",array("id"=>"descripcion","placeholder"=>"toma"));
						$form->closeTextarea();
						$tag->closeTag("div");
							
						$tag->openTag("div","","","");						
						$tag->openTag("label","","",array("for"=>"terminos"));
						$tag->output("Acepta los terminos: ");
						$tag->closeTag("label");
						$values=array("Y"=>"Si",""=>"No");
						$form->addcheckradio("checkbox","terminos", $values,0);
						$tag->closeTag("div");
							
						$tag->openTag("div","","","");
						$input->addInput("submit","","Registrarse",array('id'=>'submit'));
						$tag->closeTag("div");
						// En caso de no introducir correctamente los datos del formulario mostramos el error	
						if (isset($_GET['error'])==1) {
							$tag->output("<h3>Usuario o clave incorrecta</h3>");
						}
						// En caso de introducir correctamente los datos del formulario mostramos el enlace al login
						if (isset($_GET['correct'])==1) {
							$tag->output("<h3>Usted esta registrado correctamente</h3>");
							$menu->cargarEnlace('index.php','Inicia Sesión','enlace');
							$menu->mostrarHorizontal();	
						}

						$form->closefieldset();
							
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