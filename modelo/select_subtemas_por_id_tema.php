<?php

$id_tema = $_REQUEST['id_tema']; //Cambiar esto
	require('../query/select_subtemas_por_tema_id.php');
	
	//$id_tema = $variables_recibidas['id_tema'];
	
	//seleccionar_subtemas($mysqli, $id_tema);
	
	echo json_encode($valores);
?>