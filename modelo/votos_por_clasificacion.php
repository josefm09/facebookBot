<?PHP
	$cantidad_votos = new gestion_votos();
	
	$id_clasificacion = $_REQUEST['id_clasificacion'];
	
	$votos = $cantidad_votos->votos_por_subclasificacion($mysqli,$id_clasificacion);
	
	echo json_encode($votos);
?>