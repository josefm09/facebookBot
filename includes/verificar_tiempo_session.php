<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Octubre de 2016
* josepablo.aramburo@gmail.com
*/

/*
* En cada acceso a una pagina donde se invoque la verificacion de tiempo de session se toma el timestamp
* de la tabla expirarsession y se compara con el timestamp actual, si la diferencia es menor
* a 1200 (20 minutos) se hace update a la tabla expirarsession  con el timestamp actual y
* se le permite al usuario acceder al contenido, de ser el caso de que el tiempo exceda la marca
* la session sera terminada y se envia al usuaraio al formulario de login
*
* Esta libreria siempre debe ser llamada despues del archivo conexion
*/

//Carga el array con las variables de configuacion del sistema
require_once(dirname(__FILE__) . "/../query/select_variables_configuracion.php");//Path absoluto del archivo, considera la direccion de esta libreria y no la del scrip que la llamo

//Toma el id del ultimo login efectuado por el usuario
//Inicio del query preparado
$query = "SELECT MAX(idexpiracion) as ultimo_login from expirarsession WHERE id_usuario = ?";
if ($stmt = $mysqli->prepare($query))
	{
    //Asigna el resultado a una variable
    $stmt->bind_param("i", $id_usuario);

	//Ejecuta el query
    $stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($ultimo_login);

	// obtener valor
	$stmt->fetch();

    //Cierra el query
    $stmt->close();
    }

//Toma el tiempo de la ultima actividad del usuaraio
//Inicio del query preparado
$query = "SELECT timestamp from expirarsession WHERE idexpiracion = ?";
if ($stmt = $mysqli->prepare($query))
	{
    //Asigna el resultado a una variable
    $stmt->bind_param("i", $ultimo_login);

	//Ejecuta el query
    $stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($timestamp);

	// obtener valor
	$stmt->fetch();

    //Cierra el query
    $stmt->close();
    }

$tiempo_actual = time();//Timesamp de unix actual
$tiempo_inactivo = $tiempo_actual - $timestamp;//Obtiene el tiempo transcurrido basado en la diferencia de los timestamp
//El tiempo inactivo maximo que puede acumular un usuario en segundos, tomado de la configuacion del sistema
$tiempo_maximo_session = $configuraciones_sistema['max_inactive_session_time'];

//Variable para el cierre de session del lado del usuario, enviada por la api
$tiempo_restante_session = $tiempo_maximo_session - $tiempo_inactivo;

if ($tiempo_inactivo > $tiempo_maximo_session)
    {
    header("location:../logout.php");//Termina la session
    }

//Si la session no excede el tiempo limite el timestamp es actualizado en la base de datos
if ($tiempo_inactivo < $tiempo_maximo_session)
    {
	//En algunos casos se hacen llamadas auomaticas a la api que no deben reflejar actividad por parte del usuario en esos casos la variable
	//request_tiempo_restante_session se encuentra activa y este script evitara hacer un update en su ultimo tiempo e actividad
	if(!isset($request_tiempo_restante_session))
		{
		////Inicio del query preparado
		$stmt = $mysqli->prepare("UPDATE expirarsession
								SET timestamp = ?
								WHERE idexpiracion = ?");

		//Indica a la base de datos que recibira dos integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("ii", $tiempo_actual, $ultimo_login);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();;
		}
    }
?>
