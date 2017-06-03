<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Agrupa las funciones para la creacion de empresas
*/

class creacion_empresa
  {
  function crear_nueva_empresa($mysqli, $nombre, $rfc, $razon_social)
    {
    /*
    * Crea una nueva empresa
    */
    $estatus = 1;//Por defecto las nuevas empreas estan activas

    //Encripta los parametros recibidos
    $nombre_encriptado = encrypt_string($nombre);
    $rfc_encriptado = encrypt_string($rfc);
    $razon_social_encriptado = encrypt_string($razon_social);

    $stmt = $mysqli->prepare("INSERT INTO `empresa`(`id_empresa`, `nombre`, `rfc`, `razon_social`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("sssi", $nombre_encriptado, $rfc_encriptado, $razon_social_encriptado, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    return $nuevo_id;
    }

  function relacionar_correo_con_empresa($mysqli, $id_empresa, $id_correo_electronico)
    {
    /*
    * Establece una relacion entre una empresa y un correo
    * ya existente
    */
    $estatus = 1;//Por defecto las nuevas empreas estan activas

    $stmt = $mysqli->prepare("INSERT INTO `empresa_correo_electronico`(`id_empresa_correo_electronico`, `id_empresa`, `id_correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $id_empresa, $id_correo_electronico, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    //return $nuevo_id;
    }
}
?>
