<?PHP
	
	//if(isset($REQUEST['id_propuesta_buscar'])){
		require '../class/gestion_peticion.php';
		
		$peticion = new gestion_peticion();
		
		$id_propuesta = $_REQUEST['id_propuesta_buscar'];
	
		$datos_propuesta = $peticion->obtener_imagen_peticion_por_id_peticion($mysqli, $id_propuesta);
		
		$id_subtema = $peticion->obtener_tema_peticion_por_id_peticion($mysqli, $id_propuesta);
		
		$datos_tema = $peticion->obtener_tema_id_por_id_subtema($mysqli, $id_subtema);
		
		$nombre_completo = $peticion->obtener_imagen_peticion_por_id_peticion($mysqli, $id_propuesta);
		
		
		$arreglo_datos = Array(
			'datos_propuesta'=> $datos_propuesta,
			'datos_tema'=> $datos_tema,
			'nombre_completo'=> $nombre_completo
		);
		
		echo json_encode($arreglo_datos);
	/*}else{
		echo 'ERROR';
	}*/
?>
