<?PHP
	require "../class/gestion_proyecto_gobierno.php";
	
	$proyecto_gobierno = new proyecto_gobierno();

	$titulo_proyecto = $variables_recibidas['titulo_proyecto'];
	$descripcion_proyecto = $variables_recibidas['descripcion_proyecto'];
	
	$resultado = $proyecto_gobierno->crear_cliente($mysqli, $nombre_cliente, $paterno_cliente, $materno_cliente, $lada1_cliente, $telefono1_cliente, $tipo_telefono1_cliente, $lada2_cliente, $telefono2_cliente, $tipo_telefono2_cliente, $correo1_cliente, $correo2_cliente, $calle_cliente, $numero_cliente, $colonia_cliente, $estado_cliente, $municipio_cliente, $ciudad_cliente, $razon_social_cliente, $rfc_cliente, $direccion_cliente_facturacion, $colonia_cliente_facturacion, $ciudad_cliente_facturacion, $estado_cliente_facturacion, $cp_cliente_facturacion, $configuraciones_sistema, $id_usuario, $requiere_factura, $id_roles);
	
	if($resultado > 0){	
		
		//para relacionar cada rol con el domicilio
		$array = json_decode($roles,true);
		
		for($i=0;$i<count($array);$i++)
		{ 
			$id_rol=$array[$i];
			
			$resultado_rol = $proyecto_gobierno->relacion_domicilio_rol($mysqli, $resultado, $id_rol);
		}
		
		if($resultado_rol == "success") {	
			
			$estatus_request = "success";
			$respuesta_servidor = "¡Cliente almacenado exitosamente!";
		}
		else {
			$estatus_request = "error";
			$respuesta_servidor = "Ha ocurrido un error al almacenar";
		}
		
		$estatus_request = "success";
		$respuesta_servidor = "¡Cliente almacenado exitosamente!";
	}
	else {
		$estatus_request = "error";
		$respuesta_servidor = "Ha ocurrido un error al almacenar";
	}

	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo json_encode($respuesta);
?>