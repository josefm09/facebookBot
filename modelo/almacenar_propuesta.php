<?PHP

	//llama al documento
	require "../class/gestion_propuesta.php";
	
	//hacemos una instancia de la clase mesa
	$propuesta = new propuesta();
	
	//var para las funciones
	$titulo = $variables_recibidas['titulo'];
	$problema = $variables_recibidas['problematica'];
	$solucion = $variables_recibidas['solucion'];
	$id_subtema = $variables_recibidas['id_subtema'];
	$id_imagen = $variables_recibidas['id_imagen'];;
	
	$id_propuesta = $propuesta -> crear_propuesta($mysqli, $titulo, $solucion, $problema);
	
	if($id_propuesta != '')
	{
		$id_relacion_propuesta_subtema = $propuesta -> relacion_propuesta_con_subtema($mysqli, $id_propuesta, $id_subtema);
		$id_relacion_propuesta_imagen = $propuesta -> relacion_propuesta_con_imagen($mysqli, $id_propuesta, $id_imagen);
		
		if($id_relacion_propuesta_subtema != '' && $id_relacion_propuesta_imagen != '')
		{
			$estatus_request = 'success';
			$respuesta_servidor = 'Propuesta registrada con exito';
		}
	}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode($respuesta);

?>