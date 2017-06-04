<?php
//***********Si el usuario no tiene ninguna accion reciente registrada***********
$cdn = new ciudadano();
$ciudadano_existe = $cdn->verificar_existencia_ciudadano($mysqli, $sender);

if($ciudadano_existe = "error"){
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
}
if($ciudadano_existe = "success"){
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
        "attachment":{
          "type":"template",
          "payload":{
            "template_type":"generic",
            "elements":[
               {
                "title":"Welcome to Peter\'s Hats",
                "image_url":"https://petersfancybrownhats.com/company_image.png",
                "subtitle":"We\'ve got the right hat for everyone.",
                "default_action": {
                  "type": "web_url",
                  "url": "https://peterssendreceiveapp.ngrok.io/view?item=103",
                  "messenger_extensions": true,
                  "webview_height_ratio": "tall",
                  "fallback_url": "https://peterssendreceiveapp.ngrok.io/"
                },
                "buttons":[
                  {
                    "type":"web_url",
                    "url":"https://petersfancybrownhats.com",
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
