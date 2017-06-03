<?PHP
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	$cliente = new cliente();
	
	$id_factura_datos = $variables_recibidas['id_factura_datos'];
	
	$var = $cliente->cambiar_estatus_factura_datos_cliente($mysqli, $id_factura_datos);
	
	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Factura eliminada exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode ($respuesta);
	
	
?>