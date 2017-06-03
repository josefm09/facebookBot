<?PHP
	//llama al documento
	require "../class/gestion_caja_chica.php";

	//hacemos una instancia de la clase caja chica
	$caja_chica = new cajas();

	$id_sucursal= $_SESSION['id_sucursal'];
  $id_empresa= $_SESSION['id_empresa'];
  $prioridad= $_SESSION['prioridad'];

	//variable que recibe la caja chica
	$resultado = $caja_chica->consultar_caja_chica($mysqli, $id_sucursal, $id_empresa, $prioridad);

	$estatus_request='success';

	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $resultado);

	//codifica la informacion validada
	echo json_encode($respuesta);
?>
