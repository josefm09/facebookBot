<?PHP
	
	//if(isset($REQUEST['id_tema'])){
		require '../class/gestion_peticion.php';
		$peticion = new gestion_peticion();
		$id_propuesta = $_REQUEST['id_propuesta'];
	
		$id_subtema = $peticion->obtener_tema_peticion_por_id_peticion($mysqli, $id_propuesta);
		
		$datos_tema = $peticion->obtener_tema_id_por_id_subtema($mysqli, $id_subtema);
		
		echo json_encode($datos_tema);
	//}else{
	//	echo 'ERROR';
	//}
?>
