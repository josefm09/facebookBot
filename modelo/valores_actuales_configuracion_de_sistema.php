<?php
//El acutual estado de las configuaciones de sistema es cargado al principio de la api, esta funcion las acomoda en el array respuesta y lo retorna como json
$respuesta = array();
$respuesta['estatus_request'] = 'success';
$respuesta['default_password'] = $configuraciones_sistema['default_password'];
$respuesta['max_inactive_session_time'] = $configuraciones_sistema['max_inactive_session_time'];
	
echo json_encode($respuesta);
?>