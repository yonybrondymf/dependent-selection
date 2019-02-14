<?php 
	class Product
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}

		function getProducts($valor){
			$sql = "SELECT p.*, c.name as categoria, sc.name as subcategoria FROM products p JOIN categories c ON p.category_id = c.id JOIN subcategories sc ON p.subcategory_id = sc.id WHERE p.name like '%".$valor."%' ORDER BY p.id ASC";

			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array()) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function getCategories(){
			$sql = "SELECT * FROM categories ORDER BY id ASC";

			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array()) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function getSubCategories($category_id){
			$sql = "SELECT * FROM subcategories WHERE category_id = '$category_id' ORDER BY id ASC";

			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array()) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}


		function actualizar($id,$name,$price,$stock,$category_id,$subcategory_id)
		{
			$sql="UPDATE products SET name = '$name',price='$price',stock='$stock',category_id='$category_id', subcategory_id='$subcategory_id' WHERE id='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function guardar($name,$price,$stock,$category_id,$subcategory_id)
		{
			$sql= "INSERT INTO products VALUES(NULL,'$name','$price','$stock','$category_id','$subcategory_id')";
			//$sql="UPDATE libros SET isbn_libro = '$isbn',titulo_libro='$titulo',autor_libro='$autor',publicacion_libro='$añop', paginas_libro='$nrop', ediccion_libro='$ediccion',idioma_libro='$idioma' WHERE id_libro='$idlib'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

	}

	
	
?>