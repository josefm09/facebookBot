<?PHP
	require '../class/gestion_voto_ciudadano.php';
	// var_dump($_REQUEST);
	$voto_ciudadano = new voto_ciudadano();
	
	$id_ciudadano = $_GET['id_ciudadano'];
	$id_propuesta = $_GET['id_propuesta'];
	$voto = $_GET['voto'];
	
	$id_propuesta_voto_ciudadano = $voto_ciudadano->insertar_propuesta_voto_ciudadano($mysqli, $id_propuesta, $id_ciudadano, $voto);
	
	echo($id_propuesta_voto_ciudadano);	
?>