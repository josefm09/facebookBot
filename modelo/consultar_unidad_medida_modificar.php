<?PHP
	require "../class/gestion_productos.php";
	$productos = new productos();
	$id_unidad = $variables_recibidas['id_unidad'];
	$id_empresa= $_SESSION['id_empresa'];
	
	$unidad_medida = $productos->consulta_unidad_modificar($mysqli, $id_empresa,  $id_unidad);
	
	// if(isset ($unidad_medida))
		// {
			// echo json_encode($unidad_medida);
		// }
		
	// else 
		// {
			// echo json_encode("error");
		// }
		
	
	echo json_encode($unidad_medida);
	
?>