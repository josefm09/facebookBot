<?php
//***********Si el usuario no tiene ninguna accion reciente registrada***********

//Respuesta a facebook
$message_to_reply = 'Bienvenid@ al sistema de Culiacan inteligente, puede ver nuestras politicas de privacidad en jelousoft.com/privacidad \n \n Necesitamos que nos proveea de su numbre para continuar.';
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
