<?php
/*
* Toma el nombre enviado por el usuario y lo almacena en base de datos
*/

$cdn = new ciudadano();
$id_ciudadano = $cdn->crear_ciudadano($mysqli, $sender, $mensaje);

//Respuesta a facebook
$message_to_reply = 'Se ha enviado un correo a la direcion de email proveida, por favor hable conmigo de nuevo tras verificar su correo.';
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
//Indica que el siguiente requests sera para registrar el nombre dek ciudadano
$success = $facebook->introducir_ultimo_request($mysqli, $sender, "registrar_nombre_ciudadano");


?>
