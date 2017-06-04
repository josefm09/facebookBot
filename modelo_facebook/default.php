<?php
//***********Si el usuario no tiene ninguna accion reciente registrada***********

//Respuesta a facebook
$url = 'https://graph.facebook.com/v2.9/me/messages?access_token='.$access_token;
$message_to_reply = 'Su mensaje no pudo ser comprendido, por favor intente de nuevo.';
print $message_to_reply;
//Inicializa cURL.
$ch = curl_init($url);
//JSON a retornar
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
    },
    {
      "content_type":"text",
      "title":"Mis peticiones",
      "payload":"ver_estatus"
    }
  ]
}
}';

//Registra que no hay flujo actual
$accion_pendiente_session = $facebook->introducir_ultimo_request($mysqli, $sender, "nothing");
?>
