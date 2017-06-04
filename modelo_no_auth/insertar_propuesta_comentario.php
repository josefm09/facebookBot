<?PHP
	require '../class/gestion_comentario_ciudadano.php';
	
	$comentario_ciudadano = new comentario_ciudadano();
	
	$id_ciudadano = $_GET['id_ciudadano'];
	$id_propuesta = $_GET['id_propuesta'];
	$comentario = $_GET['comentario'];
	
	$id_propuesta_comentario_ciudadano = $comentario_ciudadano->insertar_propuesta_comentario_ciudadano($mysqli, $id_propuesta, $id_ciudadano, $comentario);
	
	echo($id_propuesta_comentario_ciudadano);	
?>