<?PHP
	// Retorna las llaves de session para ser usadas en los documentos JS
	$llaves_session = Array(
		"privilegio_administrativo" => $_SESSION['privilegio_administrativo'],
		"nombre_prioridad" => $_SESSION['nombre_prioridad'],
		"nombre_en_vista" => $_SESSION['nombre_en_vista'],
		"id_empresa" => $_SESSION['id_empresa'],
		"id_sucursal" => $_SESSION['id_sucursal']
	);
	
	echo json_encode($llaves_session);

?>