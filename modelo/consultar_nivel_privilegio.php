<?PHP
	$privilegio = $_SESSION['privilegio_administrativo'];
	
	$respuesta = array('privilegio_administrativo'=>$privilegio);
	
	echo json_encode($respuesta);
?>
