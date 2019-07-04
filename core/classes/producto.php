<?php
	class Producto{
		// Definimos los atributos de la clase Producto como privados
		private $id;
		private $nombre;
		private $descripcion;
		private $categoria;
		private $preu;
		private $imagen;
		private $producto = array();

		public function crearProducto($id,$nombre,$descripcion,$categoria,$preu, $imagen){ // Creación de producto, pasamos sus atributos y los guardamos en sus variables
			$this->id = $id;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->categoria = $categoria;
			$this->preu = $preu;
			$this->imagen = $imagen;

			$valores = array($this->id,$this->nombre,$this->descripcion,$this->categoria,$this->preu, $this->imagen); // Posteriormente guardamos en un array los datos del producto

			array_push($this->producto,$valores); // Con la funcion array_push incluimos en el array los diferentes productos

		}
			
		public function editar_producto($id,$nombre,$descripcion,$categoria,$preu,$imagen){ // Con este metodo editamos los productos redefiniendo sus atributos
			$this->id = $id;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->categoria = $categoria;
			$this->preu = $preu;
			$this->imagen = $imagen;

		}
			
		public function mostrar_productos(){ // Mostramos los productos 
			foreach($this->producto as $key => $values){ // Recorremos cada uno de ellos y mostramos cada uno de sus respectivos valores en el campo correspondiente
				echo "<div class=\"mostrar\">";
				echo "<img src=".$values[5]." width='190px' height='150px'><br/>";
				echo "<div class=\"datos\">";
				echo "<br/><b>ID: </b>".$values[0];
				echo "<br/><b>Nombre: </b>".$values[1];
				echo "<br/><b>Descripción: </b>".$values[2];
				echo "<br/><b>Categoria: </b>".$values[3];
				echo "<br/><b>Precio: </b>".$values[4]." €";
				echo "</div>";
				// Creamos un formulario para cada producto 
				echo "<form method='GET' name='form' action='tienda.php' >";
				echo "<label>Cantidad</label><br/>";
				echo "<select name='cantidad'>";
				foreach(range(1, 100) as $numero) { // Mostramos los primeros 100 numero con la función range en un select para que el usuario defina la cantidad
					echo "<option value='".$numero."'>".$numero."</option>";
				}
				echo "<input type='submit' value='confirmar'>";
				echo "</form>";
				// Creamos el enlace de cada uno de los productos mediante GET para ser añadido al carrito
				echo "<a href='carrito/mete_producto.php?id=".$values[0]."&nombre=".$values[1]."&descripcion=".$values[2]."&categoria=".$values[3]."&precio=".$values[4]."&imagen=".$values[5]."&cantidad=".$_GET["cantidad"]."'><center><img src='site_media/img/carrito.png' height=30' width='30'></center></a>";
				echo "</div>";
			}
		}
			
		public function mostrarPorCategoria($cat){ // Mostramos los productos por categoria
			$this->categoria=$cat;
			foreach($this->producto as $key => $values){ // Recorremos el array de productos y mostramos sus diferentes valores
				if($values[3]==$this->categoria){
					echo "<div class=\"mostrar\">";
					echo "<img src='../$values[5].' width='190px' height='150px'><br/>";
					echo "<div class=\"datos\">";
					echo "<br/><b>ID: </b>".$values[0];
					echo "<br/><b>Nombre: </b>".$values[1];
					echo "<br/><b>Descripción: </b>".$values[2];
					echo "<br/><b>Categoria: </b>".$values[3];
					echo "<br/><b>Precio: </b>".$values[4]." €";
					echo "</div>";
					// Creamos un formulario
					echo "<form method='GET' name='form' action='' >";
					echo "<label>Cantidad</label><br/>";
					echo "<select name='cantidad'>";
					foreach(range(1, 100) as $numero) { // Realizamos un select con los 100 primeros numeros para que el usuario defina la cantidad
						echo "<option value='".$numero."'>".$numero."</option>";
					}
					echo "<input type='submit' value='confirmar'>";
					echo "</form>";
					// Mostramos el enlace que tendra cada producto mediante GET para ser añadido al carrito
					echo "<a href='../carrito/mete_producto.php?id=".$values[0]."&nombre=".$values[1]."&descripcion=".$values[2]."&categoria=".$values[3]."&precio=".$values[4]."&imagen=".$values[5]."&cantidad=".@$_GET["cantidad"]."'><center><img src='../site_media/img/carrito.png' height=30' width='30'></center></a>";
					echo "</div>";
				}
			}
		}
	}
?>