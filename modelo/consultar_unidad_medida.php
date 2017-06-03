<?PHP
	require "../class/gestion_productos.php";
	$productos = new productos();
	$unidades = Array();
	$id_empresa= $_SESSION['id_empresa'];
	
	$unidades = $productos->unidades_activas($mysqli, $id_empresa);
	
	if(isset ($unidades))
		{
			echo json_encode($unidades);
		}
		
	else 
		{
			echo json_encode("error");
		}
		
	
	// echo json_encode($unidades);
	
?>