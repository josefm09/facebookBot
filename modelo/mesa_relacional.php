<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//Hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//var para ejecucion correcta de funcion agregar 
	$id_mesa_dinamica= $variables_recibidas['mesa_dinamica'];
	$nuevo_estatus = 1;
	
	//Cambia el estatus a mesas dinamica y guarda la respuesta del servidor
	$mesas_activas_en_mesa_dinamica = $mesas->mesas_dinamicas_activas_sucursal($mysqli, $id_mesa_dinamica);
	
	//Si la mesa dinámica contiene por lo menos una mesa sencillas se activará la mesa dinámica
	if(count($mesas_activas_en_mesa_dinamica) > 0){
	
		$mesa_relacional= $mesas->cambiar_estatus_mesa_dinamica($mysqli, $nuevo_estatus, $id_mesa_dinamica);
		
		$estatus_request = 'success';
		$respuesta_servidor = '';
		
	}else{
		
		$estatus_request = 'error';
		$respuesta_servidor = 'Aun no incluyes <strong>mesas disponibles</strong> a la estructura de tu nueva mesa.';
		
	}
	
	//Valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//Codifica la informacion validada
	echo json_encode($respuesta);
?>