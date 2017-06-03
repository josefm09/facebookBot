<?php
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	
	$cliente = new cliente();
	
	$id_cliente = $variables_recibidas['id_cliente'];
	$correo = $variables_recibidas['correo'];
	
	$var = $cliente->guardar_correo_electronico_cliente($mysqli, $id_cliente, $correo);

	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Correo electronico agregado exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo  json_encode($respuesta);
		

?>