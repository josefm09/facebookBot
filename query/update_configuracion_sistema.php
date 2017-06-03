<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Septiembre de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Modifica un campo  de la configuracion de sistema usando su nombre de variable como dato delimitante para permitir que el scrip se re use
*/

//Inicio del query preparado
$stmt = $mysqli->prepare("UPDATE configuracion
						SET atributo_de_variable = ?
						WHERE variable_de_configuracion = ?");

//Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("ss", $valor, $variable);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();
?>
