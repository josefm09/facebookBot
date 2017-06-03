<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Septiembre de 2016
* josepablo.aramburo@gmail.com
*/

/*
Almacena el JSON enviado por el cliente java como una forma de prevenir el posible mal funcionamniento de alguna funcion
*/

//Inicio del query preparado
$stmt = $mysqli->prepare("INSERT INTO `request_log` (`id_json_enviado`, `json_recibido`, `json_repuesta`, `tipo_request`, `mb_usados`, `registrado_por`, `fecha_creacion`, `ultima_modificacion`)
												VALUES
												(NULL,?,?,?,?,?,now(),now())");
	
//Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("ssssi", $json_recibido, $json_repuesta, $tipo_request, $uso_memoria, $id_usuario);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();
?>