<?PHP



	$id_clasificacion = $_REQUEST['id_clasificacion'];
	$id_impresora = $_REQUEST['id_impresora'];
	
	if($_REQUEST['id_clasificacion'] != "" && $_REQUEST['id_impresora'] != ""){

		require "../class/gestion_productos.php";

		$relacion = new productos();
		
		$id_relacion = $relacion -> almacenar_clasificacion_impresora_servidor_impresion($mysqli, $id_clasificacion, $id_impresora);
		
		if($id_relacion >= 1){
			$estatus_request = 'success';
			$respuesta_servidor = 'Se almaceno con éxito la relacion.';
		}else{
			$estatus_request = 'error';
			$respuesta_servidor = 'Se tuvo un problema al querer almacenar.';
		}
	}else{
		$estatus_request = 'error';
		$respuesta_servidor = 'Favor de selecionar una clasificacion y una impresora para relacionar.';
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode($respuesta);
?>