<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//Hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//var para ejecucion correcta de funcion agregar 
	$id_mesa_dinamica= $variables_recibidas['global_id_mesa_dinamica'];
	$id_mesa= $variables_recibidas['global_id_mesa'];
	
	//Agrega mesas a una mesa dinamica y guarda la respuesta del servidor
	$mesa_di= $mesas->agregar_mesa_a_mesa_dinamica($mysqli, $id_mesa, $id_mesa_dinamica);
	
	//
	$var = $mesa_di;
	
	//Validacion de la respuesta del servidor para enviar una respuesta al usuario
	if($var == "success")
		{
		$estatus_request = 'success';
		$respuesta_servidor = $id_mesa;
		}
		
	else 
		{
		$estatus_request = 'error';
		$respuesta_servidor = $var;
		}
		
	//Valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//Codifica la informacion validada
	echo json_encode($respuesta);
?>