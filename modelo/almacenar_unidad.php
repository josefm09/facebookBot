<?PHP
	require "../class/gestion_productos.php";
	$productos = new productos();
	
	$nombre_unidad = $variables_recibidas['unidad'];
	var_dump($nombre_unidad);
	$id_empresa= $_SESSION['id_empresa'];
	
	$var = $productos->almacenar_unidad_medida($mysqli, $nombre_unidad, $id_empresa);
	
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