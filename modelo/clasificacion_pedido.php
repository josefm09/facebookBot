<?PHP
	//llama al documento
	require "../class/gestion_productos.php";

	//hacemos una instancia de la clase productos
	$productos = new productos();

	$id_empresa= $_SESSION['id_empresa'];

	//variable que recibe productos
	$resultado = $productos->consulta_clasificacion_pedido($mysqli, $id_empresa);

	$estatus_request='success';

	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $resultado);

	//codifica la informacion validada
	echo json_encode($respuesta);
?>
