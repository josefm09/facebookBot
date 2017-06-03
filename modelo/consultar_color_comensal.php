<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";

	//hacemos una instancia de la clase caja chica
	$mesa = new mesas();

	$id_mesa_dinamica = $_REQUEST['id_mesa_dinamica'];
	
	//variable que recibe la caja chica
	$resultado = $mesa->colores_de_comensal_disponibles($mysqli, $id_mesa_dinamica);

	$estatus_request='success';

	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $resultado, 'id_mesa_dinamica' => $id_mesa_dinamica);

	//codifica la informacion validada
	echo json_encode($respuesta);
?>
