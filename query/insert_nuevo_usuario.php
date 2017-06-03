<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Noviembre de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Almacena los datos del nuevo usuario en la tabla usuario la cual contiene las credenciales para iniciar sesion
*/

//Inicio del query preparado
$stmt = $mysqli->prepare("INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `nombre_usuario`, `apellido_paterno`, `apellido_materno`, `registrado_por`, `prioridad`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
												VALUES
												(NULL,?,?,?,?,?,?,?,?,now(),now())");
	
//Indica a la base de datos que recibira 7 string y 1 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("sssssiss", $crear_nuevo_cliente_usuario, $encrypted_password, $crear_nuevo_cliente_nombre, $crear_nuevo_cliente_paterno, $crear_nuevo_cliente_materno, $id_usuario, $prioridad, $estatus);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();
?>