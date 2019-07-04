<?php

	class Carrito{
		//atributos de la clase
		public $num_productos;
		public $array_id_prod;
		public $array_nombre_prod;
		public $array_descripcion_prod;
		public $array_categoria_prod;
		public $array_precio_prod;	
		public $array_imagen_prod;
		public $array_cantidad_prod;

		//constructor que realiza las tareas de inicializar los objetos cuando se instancian
		//inicializa el numero de productos a 0
		public function carrito () {
			$this->num_productos=0;
		}

		//Introduce un producto en el carrito. Recibe los datos del producto
		//Se encarga de introducir los datos en los arrays del objeto carrito
		//luego aumenta en 1 el numero de productos
		public function introducirProducto($id_prod,$nom_prod,$desc_prod,$cat_prod,$precio_prod,$img_prod,$cant_prod){
			$this->array_id_prod[$this->num_productos]=$id_prod;
			$this->array_nombre_prod[$this->num_productos]=$nom_prod;
			$this->array_descripcion_prod[$this->num_productos]=$desc_prod;
			$this->array_categoria_prod[$this->num_productos]=$cat_prod;
			$this->array_precio_prod[$this->num_productos]=$precio_prod;
			$this->array_imagen_prod[$this->num_productos]=$img_prod;
			$this->array_cantidad_prod[$this->num_productos]=$cant_prod;
			$this->num_productos++;
		}

		//Muestra el contenido del carrito de la compra
		//ademas pone los enlaces para eliminar un producto del carrito
		public function imprime_carrito(){
			$suma = 0;
			for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
			echo "<div class=\"carrito\">";
			echo "<img src='../".$this->array_imagen_prod[$i]."' width='190px' height='150px'><br/>";
			echo "<div class=\"datos\">";
			echo "<br/><b>ID: </b>".$this->array_id_prod[$i];
			echo "<br/><b>Nombre: </b>".$this->array_nombre_prod[$i];
			echo "<br/><b>Descripción: </b>".$this->array_descripcion_prod[$i];
			echo "<br/><b>Categoria: </b>".$this->array_categoria_prod[$i];
			echo "<br/><b>Precio: </b>".$this->array_precio_prod[$i]." €";
			echo "<br/><b>Cantidad: </b>".$this->array_cantidad_prod[$i];
			echo "</div>";
			echo "<a href='eliminar_producto.php?linea=$i'><center><img src='../site_media/img/eliminar.png' height=30' width='30'></center></a>";
			echo "</div>";
			$suma += $this->array_precio_prod[$i] * $this->array_cantidad_prod[$i];
			}
			}
			echo "<div class=\"precio\">";
			echo "<b>TOTAL: </b>$suma €<br/>";
			echo "<b>IVA (21%): </b>".$suma * 1.21 ." €";
			echo "</div>";
		}

		//elimina un producto del carrito. recibe la linea del carrito que debe eliminar
		//no lo elimina realmente, simplemente pone a cero el id, para saber que esta en estado retirado
		public function eliminarProducto($linea){
			unset($this->array_id_prod[$linea]);
		}

		public function cantidadProducto(){ // Este metodo nos proporciona la cantidad de productos acumulados en el carrito
			return count($this->array_id_prod);
		} 
	}

?>
