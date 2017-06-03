<?php
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	
	$cliente = new cliente();
	
	$id_usuario = $variables_recibidas['id_usuario'];
	$nombre_cliente = $variables_recibidas['nombre'];
	$apellido_paterno_cliente = $variables_recibidas['paterno'];
	$apellido_materno_cliete = $variables_recibidas['materno'];
	
	$var = $cliente->modificar_nombre_cliente($mysqli, $id_usuario, $nombre_cliente, $apellido_paterno_cliente, $apellido_materno_cliete);

	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Nombre Modificado exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo  json_encode($respuesta);
		

?>