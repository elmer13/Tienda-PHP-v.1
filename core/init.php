<?php	
	// Incluimos las diferentes clases 
	error_reporting(0);
	require_once('classes/sesion.php');
	require_once('classes/producto.php');
	include_once('classes/HtmlForm.php');
	include_once('classes/tags.php');
	include_once("carrito/lib_carrito.php");
	include_once('includes/cabecera.php');
	include_once('includes/footer.php');
	include_once("classes/HtmlEnlace.php");
	
	// Instanciamos cada una de las clases que necesitaremos 
	$mi_sesion = new Sesion();
	@$form = new HtmlForm();
	@$input = new HtmlForm();
	@$tag = new Tag();
	$productos = new Producto();
	$cabecera = new Cabecera();
	$footer = new Footer();
	$menu = new HtmlEnlace();
	
	// Posteriormente creamos los productos de la tienda 
	$productos->crearProducto(1,"Portatil Lenovo","Ordenador portátil - Lenovo Essential Notebook G505.","Informática",299,"site_media/img/portatil_lenovo.png");
	$productos->crearProducto(2,"Portatil Acer","Ordenador portátil - Acer V5-123, 500GB, AMD Dual Core.","Informática",349,"site_media/img/portatil_acer.jpg");
	$productos->crearProducto(3,"Impresora láser","Impresora láser - Samsung SL-M2022/SEE, monocromo.","Informática",79,"site_media/img/impresora_samsung.jpg");
	$productos->crearProducto(4,"Monitor Asus","Monitor - Asus VE278N, 27 pulgadas, Full HD.","Informática",199,"site_media/img/monitor_asus.jpg");
	$productos->crearProducto(5,"Teléfono HTC","Teléfono - HTC One Max Silver de 5.9 pulgadas.","Telefonía",749,"site_media/img/movil_htc.jpg");
	$productos->crearProducto(6,"Iphone 5S","IPhone 5S Space Gray (gris) de 16GB.","Telefonía",695,"site_media/img/movil_iphone.gif");
	$productos->crearProducto(7,"Teléfono Samsung","Teléfono - Samsung Galaxy S4 Blanco, 16GB, 13 Mpx.","Telefonía",496,"site_media/img/movil_samsung.jpg");
	$productos->crearProducto(8,"Teléfono Acer","Teléfono - Acer Liquid S1 Dual SIM y pantalla HD de 5.7 pulgadas.","Telefonía",299,"site_media/img/movil_acer.jpg");
	$productos->crearProducto(9,"Cámara Olympus","Cámara - Olympus SH-25 Rosa rojiza, 16 Mp, táctil.","Fotografía",139,"site_media/img/camara_olympus.jpg");
	$productos->crearProducto(10,"Videocámara JVC","Videocámara - JVC Everio GZ-EX315WEU, Wifi.","Fotografía",359,"site_media/img/videocamara_jvc.jpg");
	$productos->crearProducto(11,"Cámara evil acuática","Cámara evil acuática - Nikon AW1, 14.2 Mp, Full HD, sumergible 15m.","Fotografía",749,"site_media/img/camara_nikon.jpg");
	$productos->crearProducto(12,"Cámara evil","Cámara evil - Olympus E-PL5 Plata + 14-42mm.","Fotografía",549,"site_media/img/camara_evil.jpg");
	$productos->crearProducto(13,"Fifa 14","PS3 FIFA 14.","Videojuegos",59.99,"site_media/img/fifa_14.jpg");
	$productos->crearProducto(14,"GTA V","PS3 GTA V - Grand Theft Auto.","Videojuegos",58.90,"site_media/img/gta_v.jpg");
	$productos->crearProducto(15,"Super Mario 3D","Wii U Super Mario 3D World.","Videojuegos",46.90,"site_media/img/wii_mario.jpg");
	$productos->crearProducto(16,"Gran Turismo","PS3 Gran Turismo 6 - GT6 - Edición Especial.","Videojuegos",68.90,"site_media/img/gran_turismo.jpg");	
	// Si no esta creado el objeto carrito en la sesion, lo creo
	if(!$mi_sesion->comprobarSesion("ocarrito")==TRUE){
	$mi_sesion->agregarSesion(array("ocarrito"=>new Carrito()));
	}

?>