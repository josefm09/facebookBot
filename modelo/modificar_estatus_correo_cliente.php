<?PHP
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	$cliente = new cliente();
	
	$id_correo = $variables_recibidas['id_correo'];
	
	$var = $cliente->cambiar_estatus_correo_cliente($mysqli, $id_correo);
	
	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Correo Electronico eliminado exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode ($respuesta);
	
	
?>