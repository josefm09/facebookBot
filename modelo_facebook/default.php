<?php
//***********Si el usuario no tiene ninguna accion reciente registrada***********
// require "../class/gestion_ciudadano.php";
$cdn = new ciudadano();
$ciudadano_existe = $cdn->verificar_existencia_ciudadano($mysqli, $sender, $mensaje);

if($ciudadano_existe == "error"){
  //Respuesta a facebook

$message_to_reply = 'Bienvenid@ al sistema de Culiacan inteligente, puede ver nuestras politicas de privacidad en jelousoft.com/privacidad \n \n Necesitamos que nos proveea de su nombre para continuar.';
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

}

if($ciudadano_existe == "success"){
  //API Url
    $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
    //Initiate cURL.
    $ch = curl_init($url);
    //The JSON data.
    $jsonData = '{
      "recipient":{
        "id":"'.$sender.'"
      },
      "message":{
        "attachment":{
          "type":"template",
          "payload":{
            "template_type":"generic",
            "elements":[
               {
                "title":"Welcome to Peters Hats",
                "image_url":"http://i.imgur.com/pW3NNM8.jpg",
                "subtitle":"We\'ve got the right hat for everyone.",
                "default_action": {
                  "type": "web_url",
                  "url": "http://i.imgur.com/pW3NNM8.jpg",
                  "messenger_extensions": true,
                  "webview_height_ratio": "tall",
                  "fallback_url": "http://i.imgur.com/pW3NNM8.jpg"
                },
                "buttons":[
                  {
                    "type":"web_url",
                    "url":"http://i.imgur.com/pW3NNM8.jpg",
                    "title":"View Website"
                  },{
                    "type":"postback",
                    "title":"Start Chatting",
                    "payload":"DEVELOPER_DEFINED_PAYLOAD"
                  }
                ]
              }
            ]
          }
        }
      }
    }';
}


?>
