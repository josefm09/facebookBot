<?PHP

	require "../class/gestion_productos.php";

	$productos = new productos();
	$id_empresa = $_SESSION['id_empresa'];

	$clasificaciones_disponibles = $productos->listado_clasifiaciones_por_empresa($mysqli, $id_empresa);

	echo json_encode($clasificaciones_disponibles);

?>
