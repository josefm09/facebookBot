<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
Modifica la contraseña del usuario
*/

////Inicio del query preparado
$stmt = $mysqli->prepare("UPDATE usuario
						SET password = ?
						WHERE id_usuario = ?");

//Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("si", $encrypted_password, $id_usuario);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();
?>