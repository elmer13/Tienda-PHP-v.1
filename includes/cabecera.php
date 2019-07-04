<?php
	class Cabecera {
		// Definimos los atributos de la clase Cabecera como privados
		private $titulo; 
		private $ubicacion;
		private $colorFuente;
		private $colorFondo;
		
		public function __construct($id="cabecera"){ // Creamos un constructor donde definimos por defecto el id cabecera 
			$this->id=$id;
		}

		public function agregarCabecera($tit,$ubi,$colorFuen,$colorFon,$imagen){ //	Recibimos por parametros las diferentes variables y las guardamos 
			$this->titulo=$tit;
			$this->ubicacion=$ubi;
			$this->colorFuente=$colorFuen;
			$this->colorFondo=$colorFon;
			$this->imagen=$imagen;
		}
	  
		public function mostrar(){
			if($this->imagen!=NULL){ // Si incluimos una imagen a nuestra cabecera la mostramos de esta manera 
				echo '<div id="'.$this->id.'" style="text-align:'.$this->ubicacion.';color:';
				echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
				echo '<img src='.$this->imagen.'>';
				echo '<h1>'.$this->titulo.'</h1>';
				echo '</div>';
			}else{ // En caso contrario definimos otra tipo de cabecera
				echo '<div id="cabecera" style="text-align:'.$this->ubicacion.';color:';
				echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
				echo '<h1>'.$this->titulo.'</h1>';
				echo '</div>';
			}
		}
	}

?>