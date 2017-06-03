<?PHP

	require "../class/gestion_mesa.php";
	$mesas = new mesas();
	
	$var= $variables_recibidas['var'];
	
	$id_sucursal=1;//$_SESSION['id_sucursal'];
	
	if( $var == "crear_mesa_dinamica"){
		
		$id_mesa_dinamica = $mesas->nueva_mesa_dinamica($mysqli, $id_sucursal);
		
		$estatus_request = 'success';
		$respuesta_servidor = $id_mesa_dinamica;
	
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo json_encode($respuesta);
?>