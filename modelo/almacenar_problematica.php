<?PHP

	//llama al documento
	require "../class/gestion_problematica.php";
	
	//Hacemos una instancia de la clase problematica 
	$problematica = new problematica();
	
	//var para ejecucion correcta de funcion crear_problematica
	$id_participante =1;
	$id_sub_tema =1;
	$id_sesion = 1;
	$ponente_designado = $variables_recibidas['ponente_designado'];
	$origen_presentacion = "propuesta_ciudadana";
	$tipo = $variables_recibidas['tipo'];
	$titulo = $variables_recibidas['titulo'];
	$descripcion = $variables_recibidas['descripcion'];
	$propuesta_solucion = $variables_recibidas['propuesta_solucion'];
	$estado= $variables_recibidas['estado'];

	$id_problematica = $problematica -> crear_problematica($mysqli, $id_participante, $id_sub_tema, $id_sesion, $ponente_designado, $origen_presentacion, 
											$tipo, $titulo, $descripcion, $propuesta_solucion, $estado);
	
	//Validacion de la respuesta del servidor para enviar una respuesta al usuario
	if($id_problematica != '')
	{
		$estatus_request = 'success';
		$respuesta_servidor = 'Registro exitoso!';
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//codifica la informacion validada para enviar
	echo json_encode($respuesta);

?>