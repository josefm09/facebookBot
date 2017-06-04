<?php
/*
* Toma el nombre enviado por el usuario y lo almacena en base de datos
*/

$cdn = new ciudadano();
$id_ciudadano = $cdn->crear_ciudadano($mysqli, $sender, $mensaje);

//Respuesta a facebook
$message_to_reply = "Su nombre ha sido registrado como: $mensaje, gracias. \n Para continuar el registro necesitamos su correo electronico.";
print $message_to_reply;

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
        "text":"'.$message_to_reply.'"
    }
}';

//Indica que espere un request para registrar correo
$success = $facebook->introducir_ultimo_request($mysqli, $sender, "nothing");


?>
