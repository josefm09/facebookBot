<?php
require "../includes/librerias.php";
require "../includes/header.html";
require "../includes/conexion.php";
require "../includes/verificar_session.php";
require "../includes/verificar_tiempo_session.php";

//Configuracion de la vista para movil
if(isset($_GET['show_desktop_mode']))
	{
	//Si el usuario pidio a cambiar a vista de escritorio
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
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';
		//echo '<meta name="mobile-web-app-capable" content="yes" />':
		}
	}

?>


<div class="col-md-12" id="navigation_spot"></div>


<div id="contenedor_general">
	<div id="cuerpo"></div>
	<div id="eventos">
		<!--<button class="btn btn-success ocultar_barra_eventos"><i class="glyphicon glyphicon-chevron-left"></i></button>-->
		<div class="col-md-12 boton_sucesos_de_sistema"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
		<div class="col-md-12 boton_sucesos_de_sistema"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
		<div class="col-md-12 boton_sucesos_de_sistema"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
		<div class="col-md-12 boton_sucesos_de_sistema"><i class="fa fa-credit-card fa-2x" aria-hidden="true"></i></div>
		<!--<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>
		<div class="row "><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos"><span class="glyphicon glyphicon-home"></span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>-->
	</div>
</div>


<!-- Fin del cuerpo de la pagina-->
</body>

<?php
//Las librerias cargan al final del documento

require "../includes/footer.html";
require "../view/modales_eventos_ajax.php";
?>

<!-- Hojas de estilo -->
<link rel="stylesheet" href="../css/style.css" media="screen">
<link rel="stylesheet" href="../css/bootstrap-switch.min.css" media="screen">


<!-- Js para la aplicacion -->
<script src="../js/configuracion_ajax.js"></script>
<script src="../js/cerrar_session.js"></script>
<script src="../js/carga_inicial.js"></script>
<!--<script src="../js/cargar_style_custom_para_usuario.js"></script>-->
<script src="../js/bootstrap-switch.min.js"></script>

<!-- Custom Fonts -->
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
