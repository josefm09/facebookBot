<?PHP
	
	require "../class/gestion_productos.php";
	
	$productos = new productos();
	$id_empresa = $_SESSION['id_empresa'];
	
	$unidades_activas = $productos->unidades_activas($mysqli, $id_empresa);
	
	echo json_encode($unidades_activas);

?>