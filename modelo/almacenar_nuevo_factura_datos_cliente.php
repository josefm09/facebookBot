<?php
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	
	$cliente = new cliente();
	
	$id_cliente = $variables_recibidas['id_cliente'];
	$razon_social = $variables_recibidas['razon_social'];
	$rfc = $variables_recibidas['rfc'];
	$calle_factura = $variables_recibidas['calle_factura'];
	$colonia_factura = $variables_recibidas['colonia_factura'];
	$ciudad_factura = $variables_recibidas['ciudad_factura'];
	$estado_factura = $variables_recibidas['estado_factura'];
	$municipio_factura = $variables_recibidas['municipio_factura'];
	$cp_factura = $variables_recibidas['cp_factura'];
	
	$var = $cliente->guardar_factura_datos_cliente($mysqli, $id_cliente, $razon_social, $rfc, $calle_factura, $colonia_factura, $ciudad_factura, $estado_factura, $municipio_factura, $cp_factura);

	if($var == "success"){
		$estatus_request = "success";
		$respuesta_servidor = "¡Factura agregada exitosamente!";
	}else{
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error";
	}
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo  json_encode($respuesta);
		

?>