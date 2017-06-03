<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Modifica la contraseña del usuario
*/

////Inicio del query preparado
$stmt = $mysqli->prepare("UPDATE usuario
						SET password = ?
						WHERE usuario = ?");

//Indica a la base de datos que recibira s string correspoendietes a los signos de ? en el query
$stmt->bind_param("ss", $encrypted_password, $usuario_seleccionado);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();
?>