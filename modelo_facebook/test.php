<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../includes/conexion.php";

require "../class/ciudadano.php";
$cdn = new ciudadano();
echo $cdn->crear_ciudadano($mysqli, 1681399951877822, 'jadahdjkabf,ac');
// *********************************************************************************

// $user_input = "cosa";
// $jsonData = "algo";
// $uso_memoria = ((memory_get_usage() / 1024) / 1024);
// $stmt = $mysqli->prepare("INSERT INTO `audit_request`(`id_audit_request`, `json_recibido`, `json_repuesta`, `mb_usados`, `fecha_creacion`, `ultima_modificacion`)
//                         VALUES
//                         (NULL,?,?,?,now(),now())");
// //Indica a la base de datos que recibira 3 string correspoendietes a los signos de ? en el query
// $stmt->bind_param("sss", $user_input, $jsonData, $uso_memoria);
// //Ejecuta el query
// $stmt->execute();
// //Cierra el query
// $stmt->close();

// *********************************************************************************
//
// $id_cliente = 1;
// $request = "algo";
// $estatus = 1;
//
// //Inicio del query preparado
// $stmt = $mysqli->prepare("INSERT INTO `log_peticiones`(`id_log_peticiones`, `id_cliente`, `ultimo_request`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
//     													VALUES
//     													(NULL,?,?,?,now(),now())");
//
//     //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
//     $stmt->bind_param("ssi", $id_cliente, $request, $estatus);
//
//     //Ejecuta el query
//     $stmt->execute();
//
//     //Toma el ID del insert recien hecho
//     $nuevo_id = $mysqli->insert_id;
//
//     //Cierra el query
//     $stmt->close();
//
//
// echo $nuevo_id;
?>
