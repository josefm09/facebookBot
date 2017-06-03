<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2017
* josepablo.aramburo@gmail.com
*/
/*
Este script actua como un controlador central de todo el sistema, todos los modelos y vistas son cargados en esta api de manera automatica
por medio de los parametros enviados en los requests AJAX
Las variables recibidas son colocadas en un array de uso general llamado $variables_recibidas donde se encontrara el input de GET y POST para
agilizar la creacion de modulos y de metodos de validacion.
*/
//Desactiva el reporte de los errores y alertas en pantalla para evitar que el output se vea contaminado con texto sin formato
error_reporting(E_ERROR);
/*require "../include/conexcion.php";
require "../clase/gestion_cliente.php";
//Carga la clase
$obj = new gestion_cliente();*/
$access_token = "EAAJZCHFSt5MYBAFZAo6STunPaf3nzBSh1W6JTVu5tHkBQ0g5IA6gi3yaST3hyR7npXzZCtu4ZATnftdwyU4Kn7QH91IqZAeBAAteoFk72WISWjymffIlxaKZAmadTgo6UOKWtXSCG4T2z0ZCy085ssn5rnerts7asdHakZB2ecOppQZDZD";
$verify_token = "hackathon";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';

//***********Si el usuario no tiene ninguna accion reciente registrada***********

  //API Url
  $url = 'https://graph.facebook.com/v2.9/me/messages?access_token='.$access_token;
  $message_to_reply = 'Huh! what do you mean?';
  print $message_to_reply;
  //Initiate cURL.
  $ch = curl_init($url);
  //The JSON data.
  $jsonData = '{
    "recipient":{
      "id":"'.$sender.'"
    },
    "message":{
    "text":"Hola espero se encuentre bien, ¿En que podemos ayudarle?",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Petición",
        "payload":"peticion"
      }
    ]
  }
  }';

    //***********Para pedir un nuevo prestamo***********
    if($message == "Petición")
      {
        //API Url
        $url = 'https://graph.facebook.com/v2.9/me/messages?access_token='.$access_token;
        //Initiate cURL.
        $ch = curl_init($url);
        //The JSON data.
        $jsonData = '{
          "recipient":{
            "id":"'.$sender.'"
          },
          "message":{
          "text":"¿Que tipo de prestamo desea?",
          "quick_replies":[
            {
              "content_type":"text",
              "title":"Prestamo individual",
              "payload":"prestamo_individual"
            },
            {
              "content_type":"text",
              "title":"Prestamo grupal",
              "payload":"prestamo_grupal"
            }
          ]
        }
        }';
      }
//pide al usuario que introdusca el numero telefonico con el que se identifica el grupo
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}
//==============================
//Audit
//==============================
require "../include/conexcion.php";
$user_input = json_encode($input);
$uso_memoria = ((memory_get_usage() / 1024) / 1024);
$stmt = $mysqli->prepare("INSERT INTO `audit_request` (`id_audit_request`, `json_recibido`, `json_repuesta`, `mb_usados`, `fecha_creacion`, `ultima_modificacion`)
                        VALUES
                        (NULL,?,?,?,now(),now())");
//Indica a la base de datos que recibira 3 string correspoendietes a los signos de ? en el query
$stmt->bind_param("sss", $user_input, $jsonData, $uso_memoria);
//Ejecuta el query
$stmt->execute();
//Cierra el query
$stmt->close();
?>
