<?PHP
	$cantidad_votos = new gestion_votos();
	
	$nombre_subclasificacion = $_REQUEST['nombre_subclasificacion'];
	
	$votos = $cantidad_votos->votos_por_propuesta($mysqli,$nombre_subclasificacion);
	
	echo json_encode($votos);
?>