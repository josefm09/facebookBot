<?PHP
	
	if(isset($REQUEST['id_peticion'])){
		require '../class/gestion_peticion.php';
		$id_peticion = $_REQUEST['id_peticion'];
		
		$arreglo_datos = Array();
		
		$imagen_peticion = obtener_imagen_por_id_peticion($mysqli, $id_peticion);
		
		$nombre_tema = obtener_tema_peticion_por_id_peticion($mysqli, $id_peticion);
		
		
		$arreglo_datos = Array(
			'imagen_peticion'=> $imagen_peticion,
			'nombre_tema'=> $nombre_tema
		);
		
		echo json_encode($arreglo_datos);
	}else{
		echo 'ERROR';
	}
?>