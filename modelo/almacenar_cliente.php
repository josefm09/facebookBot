<?PHP
	require "../class/gestion_cliente.php";
	
	$cliente = new cliente();

	$opcion = 0;
	$requiere_factura = $variables_recibidas['requiere_factura'];
	$nombre_cliente = $variables_recibidas['txt_nombre_cliente'];
	$paterno_cliente = $variables_recibidas['txt_paterno_cliente'];
	$materno_cliente = $variables_recibidas['txt_materno_cliente'];
	$lada1_cliente = $variables_recibidas['txt_lada1_cliente'];
	$telefono1_cliente = $variables_recibidas['txt_telefono1_cliente'];
	$tipo_telefono1_cliente = $variables_recibidas['txt_tipo_telefono1_cliente'];
	$lada2_cliente = $variables_recibidas['txt_lada2_cliente'];
	$telefono2_cliente = $variables_recibidas['txt_telefono2_cliente'];
	$tipo_telefono2_cliente = $variables_recibidas['txt_tipo_telefono2_cliente'];
	$correo1_cliente = $variables_recibidas['txt_correo1_cliente'];
	$correo2_cliente = $variables_recibidas['txt_correo2_cliente'];
	$calle_cliente = $variables_recibidas['txt_calle_cliente'];
	$numero_cliente = $variables_recibidas['txt_numero_cliente'];
	$colonia_cliente = $variables_recibidas['txt_colonia_cliente'];
	$estado_cliente = $variables_recibidas['txt_estado_cliente'];
	$municipio_cliente = $variables_recibidas['txt_municipio_cliente'];
	$ciudad_cliente = $variables_recibidas['txt_ciudad_cliente'];
	$razon_social_cliente = $variables_recibidas['txt_razon_social_factura'];
	$rfc_cliente = $variables_recibidas['txt_rfc'];
	$direccion_cliente_facturacion = $variables_recibidas['txt_direccion_factura'];
	$colonia_cliente_facturacion = $variables_recibidas['txt_colonia_factura'];
	$ciudad_cliente_facturacion = $variables_recibidas['txt_ciudad_factura'];
	$estado_cliente_facturacion = $variables_recibidas['txt_estado_factura'];
	$cp_cliente_facturacion = $variables_recibidas['txt_cp_factura'];
	$id_roles = $variables_recibidas['roles'];

	
	$resultado = $cliente->crear_cliente($mysqli, $nombre_cliente, $paterno_cliente, $materno_cliente, $lada1_cliente, $telefono1_cliente, $tipo_telefono1_cliente, $lada2_cliente, $telefono2_cliente, $tipo_telefono2_cliente, $correo1_cliente, $correo2_cliente, $calle_cliente, $numero_cliente, $colonia_cliente, $estado_cliente, $municipio_cliente, $ciudad_cliente, $razon_social_cliente, $rfc_cliente, $direccion_cliente_facturacion, $colonia_cliente_facturacion, $ciudad_cliente_facturacion, $estado_cliente_facturacion, $cp_cliente_facturacion, $configuraciones_sistema, $id_usuario, $requiere_factura, $id_roles);
	
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