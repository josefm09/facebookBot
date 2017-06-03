<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//Esta variable toma el valor que le asignen $_SESSION['id_sucursal'];
	$id_sucursal= $_SESSION['id_sucursal'];
	
	//variable que recibe las mesas activas
	$mesas_activas = $mesas->mesas_activas_sucursal($mysqli, $id_sucursal);
	
	$estatus_request='success';
	
	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $mesas_activas);
	
	//codifica la informacion validada
	echo json_encode($respuesta);
?>