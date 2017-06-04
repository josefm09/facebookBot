<?PHP
	$cantidad_votos = new gestion_votos();
	
	$votos = $cantidad_votos->votos_total_clasificacion($mysqli);
	
	echo json_encode($votos);
?>