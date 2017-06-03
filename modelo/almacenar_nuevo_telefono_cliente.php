<?php
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	
	$cliente = new cliente();
	
	$id_cliente = $variables_recibidas['id_cliente'];
	$lada = $variables_recibidas['lada'];
	$telefono = $variables_recibidas['telefono'];
	$tipo_telefono = $variables_recibidas['tipo_telefono'];
	
	$var = $cliente->guardar_telefono_cliente($mysqli, $id_cliente, $lada, $telefono, $tipo_telefono);

	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Telefono agregado exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo  json_encode($respuesta);
		

?>