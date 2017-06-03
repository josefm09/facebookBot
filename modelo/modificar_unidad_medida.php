<?PHP
	require "../class/gestion_productos.php";
	$productos = new productos();
	$id_unidad = $variables_recibidas['id_unidad'];
	$unidad_medida = $variables_recibidas['unidad_medida'];
	$id_empresa= $_SESSION['id_empresa'];
	
	$var = $productos->modificar_unidad_medida($mysqli, $unidad_medida, $id_empresa, $id_unidad);
	
	if($var == "success")
		{
		$estatus_request = 'success';
		$respuesta_servidor = $var;
		}
		
	else 
		{
		$estatus_request = 'error';
		$respuesta_servidor = $var;
		}
		
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	echo json_encode($respuesta);
	
?>