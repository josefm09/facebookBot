<?PHP
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	$cliente = new cliente();
	
	$id_domicilio = $variables_recibidas['id_domicilio'];
	$id_domicilio_estado = $variables_recibidas['id_domicilio_estado'];
	$id_domicilio_municipio = $variables_recibidas['id_domicilio_municipio'];
	
	$var = $cliente->cambiar_estatus_domicilio_cliente($mysqli, $id_domicilio);
	
	$var_2 = $cliente->cambiar_estatus_estado_municipo_cliente($mysqli, $id_domicilio_estado, $id_domicilio_municipio);

	if($var == "success" && $var_2 == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Domicilio eliminado exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo json_encode ($respuesta);
	
	
?>