<?php
//http://localhost/dbm_v3/api/api.php?accion=registro_servidor_impresora&tipo_accion=modelo&auth=c

//Es recibido en formato JSON
$request = $_REQUEST['request'];

//Inicializa la clase
require "../class/gestion_impresiones.php";
$impresiones = new impresiones();

//Creacion de nuevo servidor de impresion
if($request == 'obtener_url')
  {
  //Crea un nuevo servidor de impresion
  $codigo_servidor = $impresiones->crear_servidor_impresion($mysqli, 1, 'compu en cocina');

  //Url absoluta para ejectuar el script actual incluyendo peticiones GET
  $url_script_actual = $impresiones->url_absoluto_script();

  //Remueve de la url la variable request y todo lo que le sigue
  $url_script_actual = explode('&request', $url_script_actual);
  $url_sin_json = $url_script_actual[0];

  $url_par_java = "$url_sin_json&key=$codigo_servidor";

  echo $url_par_java;
  }

//Agregar impresoras a servidor de impresion
if($request == 'registrar_impresoras')
  {
  //Se reciben en un JSON
  $impresoras_server = $_REQUEST['impresoras'];
  $codigo_servidor = $_REQUEST['key'];

  $impresoras_server = json_decode($impresoras_server, true);

  $total_impresoras = $impresoras_server['total'];
  $contador = 0;
  while($contador <= $total_impresoras)
    {
    $nombre_impresora = $impresoras_server[$contador];

    $impresiones->registrar_impresora($mysqli, $codigo_servidor, $nombre_impresora);

    $contador++;
    }
  }

//Para ver trabajos de impresion pendientes
if($request == 'cola_impresion')
  {
  $codigo_servidor = $_REQUEST['key'];

  echo $impresiones->tomar_orden_impresion($mysqli, $codigo_servidor);
  }
?>
