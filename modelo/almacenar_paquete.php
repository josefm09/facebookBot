<?PHP

	//llama al documento
	require "../class/gestion_paquete.php";
	
	//Hacemos una instancia de la clase mesa
	$paquete = new paquete();
	
	$nombre_paquete = $variables_recibidas['nombre_paquete'];
	$precio_paquete = $variables_recibidas['precio_paquete'];
	$producto_paquete= $variables_recibidas['producto_paquete'];
	$id_imagen_paquete = $_REQUEST['id_imagen_paquete'];
	$id_sucursal = 1;//$_SESSION['id_sucursal'];
	
	//Crea el paquete y guarda el id retornado
	$id_paquete = $paquete -> alta_paquete($mysqli, $nombre_paquete, $precio_paquete);
	
	//Relaciona la tabla paquete con la de sucursal
	$id_paquete_sucursal = $paquete -> relacionar_paquete_con_sucursal($mysqli, $id_paquete, $id_sucursal);
	
	//Relaciona la tabla paquete con la de imagen
	$id_paquete_imagen = $paquete -> relacionar_paquete_con_imagen($mysqli, $id_paquete, $id_imagen_paquete);
	
	//Relaciona la tabla paquete con la de producto
	$id_paquete_producto = $paquete -> relacionar_paquete_con_producto($mysqli, $id_paquete, $producto_paquete);
	
	$estatus_request = 'success';
	$respuesta_servidor = "Paquete creado exitosamente";
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo json_encode($respuesta);
		
?>