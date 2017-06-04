<?PHP
	$cantidad_votos = new gestion_votos();
	
	$votos = $cantidad_votos->votos_por_subclasificacion($mysqli,$id_clasificacion);
	
	echo json_encode($votos);
?>