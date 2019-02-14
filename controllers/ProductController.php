<?php 
	require_once("../models/Product.php");
	$boton= $_POST['action'];

	if($boton==='list')
	{
		
        $valor = $_POST['valor'];
		$ins   = new Product();
		$registros = $ins->getProducts($valor);
		
		
		echo json_encode($registros);
	}

	if($boton==='getCategories')
	{
		$ins   = new Product();
		$registros = $ins->getCategories();
		
		echo json_encode($registros);
	}

	if($boton==='getSubCategories')
	{
		$category_id = $_POST['category_id'];
		$ins   = new Product();
		$registros = $ins->getSubCategories($category_id);
		
		echo json_encode($registros);
	}

	if ($boton==='save') {
		$inst = new Product();
		
		$name = $_POST['name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		
		if($inst->guardar($name,$price,$stock,$category,$subcategory)){
			echo '1';
		}
		else{
			echo "0";
		}
	}

	if ($boton==='update') {
		$inst = new Product();
		$id = $_POST['idProduct'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		
		
		if($inst->actualizar($id,$name,$price,$stock,$category,$subcategory)){
			echo '1';
		}
		else{
			echo "0";
		}
		
		
	}

	
?>