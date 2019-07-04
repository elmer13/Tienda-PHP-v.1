<?php
	class Footer{
		// Definimos los atributos de la clase Footer como privados
		private $texto;
		private $ubicacion;
		private $colorFuente;
		private $colorFondo;
		
		public function __construct($id="footer"){ // Creamos un constructor donde definimos por defecto el id footer
			$this->id = $id;
		}

		public function agregarFooter($cadena,$ubicacion,$colorFuen, $colorFon){ //	Recibimos por parametros las diferentes variables y las guardamos 
			$this->texto = $cadena;
			$this->ubicacion = $ubicacion;
			$this->colorFuente = $colorFuen;
			$this->colorFondo = $colorFon;
		}
		
		public function mostrar(){ // Mostramos el footer 
			echo "<hr/>";
			echo '<div id="'.$this->id.'" style="font-size:20px;text-align:'.$this->ubicacion.';color:';
			echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
			echo $this->texto;
			echo '</div>';
		}
	}
?>