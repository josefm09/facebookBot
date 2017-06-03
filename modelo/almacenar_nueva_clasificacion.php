<?PHP

	$id_empresa = $_SESSION['id_empresa'];

	$nombre_clasificacion = $_REQUEST['nombre_clasificacion'];
	$id_imagen_clasificacion = $_REQUEST['id_imagen_clasificacion'];
	
	if(isset($_SESSION['id_empresa']) && $_REQUEST['nombre_clasificacion'] != "" && $_REQUEST['id_imagen_clasificacion'] != ""){

		require "../class/gestion_productos.php";

		$almacenar_clasificacion = new productos();
		
		$id_clasificacion = $almacenar_clasificacion -> crear_clasificacion($mysqli, $id_empresa, $nombre_clasificacion, $id_imagen_clasificacion);
		
		if($id_clasificacion >= 1){
			$estatus_request = 'success';
			$respuesta_servidor = 'Se almaceno con éxito la clasicación.';
		}else{
			$estatus_request = 'error';
			$respuesta_servidor = 'Se tuvo un problema al querer almacenar.';
		}
	}else{
		$estatus_request = 'error';
		$respuesta_servidor = 'Favor de escribir un nombre para la clasificación.';
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode($respuesta);
?>