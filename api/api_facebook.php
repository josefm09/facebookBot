<?php
/*
* Creado por JelouSoft
* Junio de 2017
*
* Jose Pablo Domingo Aramburo Sanchez
* josepablo.aramburo@gmail.com
*
* Jose Carlos Flores Moran
+ josecarlos_floresmoran@hotmail.com
*/

/*
* Esta api sera el punto central para interactuat con el servicio de facebook
*
* Cada peticion enviada por facebook contiene una accion la cual sera
* cargada por la api haciendo una llamada a la classe correspondiente lo cual
* volvera mas ligera la interfaz web y permitira segmentar mas el codigo por
* bloques
*/

//Desactiva el reporte de los errores y alertas en pantalla para evitar
//que el output se vea contaminado con texto sin formato
error_reporting(E_ERROR);

require "../includes/conexion.php";

/*
* Autocarga de clases, para hacer uso de una clase solo es necesario
* declararla, ejemplo $algo = NEW algo(); con esto la funcion cargara el
* script correspondiente de manera automatica
*
* Para que la autocarga funcione es necesario que la clase y el archivo
* tengan el mismo nombre
*/
spl_autoload_register(function ($nombre_clase) {
    require_once "../class/$nombre_clase.php";
});

/*
* Autentificacion con facebook al momento de recibir el request
*/
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

/*
* Decodifica el JSON pasado por facebook como parte del request
*/
$input = json_decode(file_get_contents('php://input'), true);//Raw data
//ID interno de facebook para identificar al usuario que envia el mensaje
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
//El mensaje enviado, este puede ser la payload del input o bien el texto enviado
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';

/*
* Inicia el proceso pada determinar que mensaje mostrar al usuario
*/

//Toma el la siguiente accion a llevar a cabo desde base de datos
$facebook = NEW facebook();
$accion_pendiente_session = $facebook->tomar_ultimo_request($mysqli, $sender);

//Si el estatus es default significa que el usuario es nuevo o caduco su session
if($accion_pendiente_session == "default")
  {
  require "../modelo_facebook/default.php";
  }

//No hay flujo proramado desde base de datos, se toma el input del usuario
if($accion_pendiente_session == "nothing")
  {
  if (file_exists(dirname(__FILE__) . "/../modelo_facebook/$mensaje.php"))
		{
		require (dirname(__FILE__) . "/../modelo_facebook/$mensaje.php");
		}
  }

//Si hay un flujo pendiente
if($accion_pendiente_session != "default" AND $accion_pendiente_session != "nothing")
  {
  if (file_exists(dirname(__FILE__) . "/../modelo_facebook/$accion_pendiente_session.php"))
		{
		require (dirname(__FILE__) . "/../modelo_facebook/$accion_pendiente_session.php");
		}
  }

/*
* Codifica la respuesta y la retorna a facebook
*/
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
