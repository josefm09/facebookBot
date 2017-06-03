<?php
$variable = $variables_recibidas['variable'];
$valor = $variables_recibidas['valor'];	
	
//Verfica que no se pasen valores vacios
if($variable === '' OR $valor === '')
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'El servidor recibio variables vacias, no se han hecho cambios a la configuacion';
	}
	
//Verifica que las variables que deben ser numericas reciban caracteres validos
if($variable === "max_inactive_session_time")
	{
	//Verifica que las variables numericas reciban caracteres validos
	if(!is_numeric($valor))
		{
		$estatus_request = 'error';
		$respuesta_servidor = "La variable deber ser un valor numerico, no se han hecho cambios a la configuacion";
		}
	}
	
//Si no hay errores en la validacion de variables
if($estatus_request != 'error')	
	{
	//Almacena el cambio
	require "../query/update_configuracion_sistema.php";
		
	$estatus_request = 'success';
	$respuesta_servidor = "La variable fue cambiada exitosamente a <b>$valor</b>";
	}
	
$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);

echo json_encode($respuesta);
?>