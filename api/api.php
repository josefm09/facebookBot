<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
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

//Recibe las variables enviadas por GET o POST y las introduce en un array associativo de uso general el cual
//Este array permitira mitigar errores de protocolo de envio de variables y facilitara la reutilizacion y creacion de codigo
if(isset($_POST['accion']))
	{
	$variables_recibidas = $_POST;
	}

elseif(isset($_GET['accion']))
	{
	$variables_recibidas = $_GET;
	}

/*
* Si la variable auth es enviada en el request se le dara acceso limitado a la api,
* puediendo usar solamente algunos modelos y vistas guardados en directorios
* separados, esto es solo para poder ofrecer prestaciones adicionales sin que el
* usuario necesite tener una cuenta o autentificarse
*/

if(!isset($variables_recibidas['auth']))
	{
	$has_auth = "true";//Acceso a todo el sistema
	}

if(isset($variables_recibidas['auth']))
	{
	$has_auth = "false";//Acceso limitado
	}

if($has_auth == "true")
	{
	//Verifica que el usuario tenga una session activa
	require "../includes/verificar_session.php";

	//Si el usuario master es quien accede al sistema le da acceso total a la base de datos
	if($_SESSION['nombre_prioridad'] === "mucaama_master")
		{
		require "../includes/conexion_master.php";
		}

	else
		{
		require "../includes/conexion.php";
		}
		
		spl_autoload_register(function ($nombre_clase) {
			require_once "../class/$nombre_clase.php";
		});
	/*
	Verifica si el request esta definido como automatizado, por ejemplo en la verificacion de tiempo de session del lado del usuario
	El contenido de la variable no importa, el chequeo solo verifica que exista
	*/
	if(isset($variables_recibidas['request_tiempo_restante_session']))
		{
		$request_tiempo_restante_session = $variables_recibidas['request_tiempo_restante_session'];
		}

	/*Verifica el tiempo que el usuario a paso inactivo, si excede la cantidad pre definida cierra session ademas si la variable request_tiempo_restante_session
	no esta inicializada hace un update a la base de datos con el tiempo actual como ultima activiad del usuario si este no a excedido su tiempo maximo
	de inactividad
	*/
	require "../includes/verificar_tiempo_session.php";
	}

//*************************
elseif($has_auth == "false")
	{
	require "../includes/conexion_no_auth.php";

	//Carga los array con las variables de configuacion de los distintos tipos de usuario
	//Retorna $configuraciones_sistema
	require "../query/select_variables_configuracion.php";
	}
//=================================================================================
//                        Auto carga
//=================================================================================
/*
* Carga todas las funciones custom siempre y cuando la peticion no sea para
* determinar el tiempo restante de la session
*
* decrypt_password($configuraciones_sistema, $password, $password_database)
* encrypt_password($configuraciones_sistema, $password)
* random_string_openssl($output_length)
* encrypt_string($texto)
* decrypt_string($cipher_text)
*/
if(!isset($variables_recibidas['request_tiempo_restante_session']))
	{
	foreach (glob("../funcion/*.php") as $filename)
		{
	  require_once $filename;
		}
	}

//Toma de variables necesarias para la auto carga
$accion = $variables_recibidas['accion'];
$tipo_accion = $variables_recibidas['tipo_accion'];

/*
* Determina que tipo de archivo es solicitado y si existe en su correspondiente directorio lo llama
* nunca se confia en el imput del usuario por ello se limita por codigo duro la carpeta fuente de los archivos solicitados
*/

//Para los requests con session activa
if($has_auth == "true")
	{
	if($tipo_accion === "view")
		{
		if (file_exists(dirname(__FILE__) . "/../view/$accion.php"))
			{
			require (dirname(__FILE__) . "/../view/$accion.php");
			}
		}

	if($tipo_accion === "modelo")
		{
		if (file_exists(dirname(__FILE__) . "/../modelo/$accion.php"))
			{
			require (dirname(__FILE__) . "/../modelo/$accion.php");
			}
		}
	}

//Para requests sin inicio de session
if($has_auth == "false")
	{
	if($tipo_accion === "view")
		{
		if (file_exists(dirname(__FILE__) . "/../view_no_auth/$accion.php"))
			{
			require (dirname(__FILE__) . "/../view_no_auth/$accion.php");
			}
		}

	if($tipo_accion === "modelo")
		{
		if (file_exists(dirname(__FILE__) . "/../modelo_no_auth/$accion.php"))
			{
			require (dirname(__FILE__) . "/../modelo_no_auth/$accion.php");
			}
		}
	}

//=================================================================================
//                        Logs
//=================================================================================
//Solo se almacenaran requests que no sean chequeo de tiempo de session
if(!isset($variables_recibidas['request_tiempo_restante_session']))
	{
	/*
	* Determina el consumo en MB de memoria que utilizo el script durante su ejectucion
	* esto servira para detectar futuros cuellos de botella y realizar optimizaciones
	*/

	$uso_memoria = ((memory_get_usage() / 1024) / 1024);

	//Datos del json enviado por el cliente a manera de bitacora de peticiones
	if(isset($_POST['accion']))
		{
		//$json_recibido = json_encode($_POST);
		$tipo_request = "POST";
		}

	elseif(isset($_GET['accion']))
		{
		//$json_recibido = json_encode($_GET);
		$tipo_request = "GET";
		}

	$json_recibido = json_encode($variables_recibidas);

	//Se almacena tambien la respuesta en JSON, si el output no fue JSON almacena un NULL
	if(isset($respuesta))
		{
		$json_repuesta = json_encode($respuesta);
		}

	else
		{
		$json_repuesta = NULL;
		}

	if($has_auth == "true")
		{
		$registrado_por = $id_usuario;
		}

	elseif($has_auth == "false")
		{
		$registrado_por = NULL;
		}

	require "../query/insert_request_log.php";
	}
?>
