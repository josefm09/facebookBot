<?php
//Envia el tiempo restante en la session para hacer cierre de session del lado del usuario
//El include de verificar session al inicio de la api genera la variable que se envia al cliente con el tiempo restante de la session
$respuesta = array('tiempo_restante_session' => $tiempo_restante_session);

echo json_encode($respuesta);
?>