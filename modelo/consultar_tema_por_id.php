<?PHP
	
	//if(isset($REQUEST['id_tema'])){
		require '../class/gestion_peticion.php';
		$peticion = new gestion_peticion();
		$id_tema = $_REQUEST['id_tema'];
	
		$nombre_tema = $peticion->obtener_tema_peticion_por_id_peticion($mysqli, $id_tema);
		
		echo json_encode($nombre_tema);
	//}else{
	//	echo 'ERROR';
	//}
?>
