<?php
	header('Content-Type: application/json');
	
	require '../class/gestion_cliente.php';
	
	$cliente = new cliente();
	
	$id_cliente = $variables_recibidas['id_cliente'];
	$calle_cliente = $variables_recibidas['calle_cliente'];
	$numero_cliente = $variables_recibidas['numero_cliente'];
	$colonia_cliente = $variables_recibidas['colonia_cliente'];
	$estado_cliente = $variables_recibidas['estado_cliente'];
	$municipio_cliente = $variables_recibidas['municipio_cliente'];
	$ciudad_cliente = $variables_recibidas['ciudad_cliente'];
	$roles = $variables_recibidas['roles'];
	
	$resultado = $cliente->guardar_domicilio_cliente($mysqli, $id_cliente, $calle_cliente, $numero_cliente, $colonia_cliente, $estado_cliente, $municipio_cliente, $ciudad_cliente);
	
	if($resultado > 0){
		
		//para relacionar cada rol con el domicilio
		$array = json_decode($roles,true);
		
		for($i=0;$i<count($array);$i++)
		{ 
			$id_rol=$array[$i];
			
			$resultado_rol = $cliente->relacion_domicilio_rol($mysqli, $resultado, $id_rol);
		}
		
		if($resultado_rol == "success") {	
			
			$estatus_request = "success";
			$respuesta_servidor = "¡Cliente almacenado exitosamente!";
		}
		else {
			$estatus_request = "error";
			$respuesta_servidor = "Ha ocurrido un error al almacenar";
		}
	}else {
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error al almacenar";
	}
	
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo  json_encode($respuesta);
		

?>