<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//estas variables reciben los valores que les mandan desde js
	$var= $variables_recibidas['var'];
	
	//Variable con un valor constante. Luego se modificara
	$id_sucursal= $_SESSION['id_sucursal'];
	
	//Validacion para crear una mesa dinamica
	if( $var == "crear_mesa_dinamica"){
		
		//Se crea la mesa dinamica y se guarda la respuesta del servidor
		$id_mesa_dinamica = $mesas->nueva_mesa_dinamica($mysqli, $id_sucursal);
		
		//Instruccion que indica que la informacion recibida es correcta
		$estatus_request = 'success';
		
		//Asigna la respuesta del servidor a la variable
		$respuesta_servidor = $id_mesa_dinamica;
		
	}
			
	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//codifica la informacion validada
	echo json_encode($respuesta);
?>