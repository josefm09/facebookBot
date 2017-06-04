<?PHP
	require '../modelo_no_auth/gestion_voto_ciudadano.php';
	
	$voto_ciudadano = new voto_ciudadano();
	
	$id_ciudadano = $REQUEST['id_ciudadano'];
	$id_propuesta = $REQUEST['id_propuesta'];
	$voto = $REQUEST['voto'];
	
	$id_propuesta_voto_ciudadano = $voto_ciudadano->insertar_propuesta_voto_ciudadano($mysqli, $id_propuesta, $id_ciudadano, $voto);
	
	echo($id_propuesta_voto_ciudadano);	
?>