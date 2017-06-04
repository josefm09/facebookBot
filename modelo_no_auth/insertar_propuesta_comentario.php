<?PHP
	require '../modelo_no_auth/gestion_comentario_ciudadano.php';
	
	$comentario_ciudadano = new comentario_ciudadano();
	
	$id_ciudadano = $REQUEST['id_ciudadano'];
	$id_propuesta = $REQUEST['id_propuesta'];
	$comentario = $REQUEST['comentario'];
	
	$id_propuesta_comentario_ciudadano = $comentario_ciudadano->insertar_propuesta_comentario_ciudadano($mysqli, $id_propuesta, $id_ciudadano, $comentario);
	
	echo($id_propuesta_comentario_ciudadano);	
?>