<?PHP
	$id_empresa = $_SESSION['id_empresa'];	
	$validacion = $_REQUEST['valor_selector'];
	$id_swithc = $_REQUEST['id_switch'];
	$nombre_empresa = $variables_recibidas['nombre_empresa'];
	
	//$a = 'Se encontro un error al querer realizar la modificación.';
			
	if($id_empresa === '' or $validacion === '' or $id_swithc === '' or $nombre_empresa === '')
		{
			$estatus_request = 'error';
			$respuesta_servidor = 'Para poder hacer alguna modificacion, necesitamos que ingrese todos los datos';
		}
	if($estatus_request !== 'error')
		{	
			if($id_swithc == 2){
				$id_config = 13;
			}
			if($id_swithc == 3){
				$id_config = 14;
			}
			if($id_swithc == 4){
				$id_config = 15;
			}
			if($id_swithc == 5){
				$id_config = 16;
			}
			
			if($id_swithc == 6){
				$id_config = 17;			
			}
			
			if($id_swithc == 7){
				$id_config = 18;			
			}
			
			
			if($validacion == 1){
				$atributo_variable = "true";
			}
			if($validacion == 0){
				$atributo_variable = "false";
			}
			if($validacion == 3){
				$atributo_variable = $nombre_empresa;		
			}
			if($validacion == 4){
				$atributo_variable = $variables_recibidas['hash_imag'];
			}
			
			$a = cambiar_config_empresa($mysqli, $id_config, $id_empresa, $atributo_variable);
		
			$estatus_request = 'success';
			$respuesta_servidor = 'Se realizo con éxito la modificación.';	
		}
	
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode($respuesta);
?>
