<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//estas variables reciben los valores que les mandan desde js
	$nombre_mesa = $variables_recibidas['nombre_mesa'];
	$capacidad_mesa = $variables_recibidas['capacidad_mesa'];
	$id_mesa= $variables_recibidas['global'];
	
	//Esta variable toma el valor que le asignen $_SESSION['id_sucursal'];
	$id_sucursal= $_SESSION['id_sucursal'];
	
	if($nombre_mesa === '' or $capacidad_mesa === '')
		{
			$estatus_request = 'error';
			$respuesta_servidor = 'Es necesario que proporcione todos los datos de la mesa';
		}
	
	if($estatus_request !== 'error')
		{
			if(isset($nombre_mesa) and isset($capacidad_mesa))
				{
					if($id_mesa == 0){
						//Guarda la respuesta_mysql que retorna la funcion 
						$var = $mesas->crear_nueva_mesa($mysqli, $nombre_mesa, $capacidad_mesa, $id_sucursal);
					}
					
					if($id_mesa > 0){
						//Guarda la respuesta_mysql que retorna la funcion 
						$var = $mesas->actualizar_info_mesa($mysqli, $nombre_mesa, $capacidad_mesa, $id_mesa);
					}
				}
					
			//Validacion para mandar una respuesta al usuario
			if($var === 'success')
				{
					if($id_mesa == 0){
						$estatus_request = 'success';
						$respuesta_servidor = "Mesa creada con exito.";
					}
					
					if($id_mesa > 0){
						$estatus_request = 'success';
						$respuesta_servidor = "Moficacion exitosa.";
					}	
				}
			else
				{
					$estatus_request = 'error';
					$respuesta_servidor = 'Asegurese de que la sucursal exista en base de datos';
				}
		}
		
	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//codifica la informacion validada
	echo json_encode($respuesta);	
?>