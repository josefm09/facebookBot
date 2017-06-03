<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Octubre de 2016
* josepablo.aramburo@gmail.com
*/

/*
Usando la llave de session prioridad generada en login.php interactua con la tabla prioridades para definir
la pagina de inicio a la que el usuario debe ser enviado sin tener que hacer una clausula if para cada caso
*/

require "includes/header.html";
require "includes/librerias.php";
require "includes/conexion.php";
require "includes/verificar_session.php";

//Configuracion de la vista para movil
if(isset($_GET['show_desktop_mode']))
	{
	//Si el usuario pidio cambiar a vista de escritorio
	if($_GET['show_desktop_mode'] == "true")
		{
		$_SESSION['mobile'] = "false";//Desactiva la vista para movil
		}
	//Si pidio volver a vista movil
	elseif($_GET['show_desktop_mode'] == "false")
		{
		$_SESSION['mobile'] = "true";//Activa la vista para movil
		}

	header("Refresh:0; url=index.php");
	}

else
	{
	//Si se detecto que el usuario usa un dispositivo movil hace saber al navegador que la pagina esta optimizada para uso movil
	if($_SESSION['mobile'] == "true")
		{
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />';
		}
	}

$query = "SELECT `nombre_prioridad`, `privilegio_administrativo`, `nombre_en_vista` FROM prioridad WHERE prioridad = ?";
if ($stmt = $mysqli->prepare($query))
        {
        //Asigna las variables para el query
        $stmt->bind_param("s", $_SESSION['prioridad']);

        //Ejecuta el query
        $stmt->execute();

        //Asigna el resultado a una variable
        $stmt->bind_result($nombre_prioridad, $privilegio_administrativo, $nombre_en_vista);

        /* obtener valor */
        $stmt->fetch();

        //Cierra el query
        $stmt->close();
        }

//Nombre que se le da a la prioridad en lenguage humano, para ser usada en la api
$_SESSION['nombre_prioridad'] = $nombre_prioridad;
$_SESSION['privilegio_administrativo'] = $privilegio_administrativo;
$_SESSION['nombre_en_vista'] = $nombre_en_vista;

//Verifica que el usuario tenga una session valida y redirecciona a la pagina de landing
if ($_SESSION['nombre_prioridad'] == "hackathon_master" OR $_SESSION['nombre_prioridad'] == "hackathon_administrativo" OR $_SESSION['nombre_prioridad'] == "hackathon_cliente" OR $_SESSION['nombre_prioridad'] == "hackathon_empleadas")
	{
		header("location:landing/panel.php");
	}

else
	{
	?>
	<center>
		<p class="lead">No tiene los privilegios necesarios para acceder al sistema</p>

		<br>

		<img src="imagenes/nope.jpg" class="img-responsive" alt="Nope">

		<audio controls autoplay>
			<source src="otros/Engineer_boo.wav" type="audio/wav">
			Su navegador no tiene soporte para HTML5
		</audio>
	</center>
	<?php
	}
?>
