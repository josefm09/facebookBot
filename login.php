<?php
//Desactiva el reporte de los errores y alertas en pantalla para evitar que el output se vea contaminado con texto sin formato
error_reporting(E_ERROR);

require "includes/header.html";
require "includes/librerias.php";

echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';

//Cuando se proveen credenciales no validas la validacion de login retorna una variable por get para que el mensaje de error sea mostrado al retornar
//al usuario a la vista
if($_GET['estatus'] == "1")
	{
	?>
	<div class="alert alert-danger alert-dismissible" role="error">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<center>
			Su usuario o contraseña son incorrectos, intente nuevamente.
		</center>
	</div>
	<?php
	}
?>
<div class="container">
        <div class="logo"></div>
        <div class="login-block">
                <form action="modelo/validar_login.php" method="post" name="Login_Form" class="login">
                        <h1>Login</h1>
                        <input type="text" value="" placeholder="Usuario" id="user" name="user" required="" autofocus=""/>
                        <input type="password" value="" placeholder="Password" id="password" name="password" required=""/>
                        <button class="btn btn-lg btn-warning btn-default"  name="login" value="Login" type="Submit">Iniciar sesion</button>
                </form>
        </div>
</div>

<!-- jQuery library -->
<script src="js/jquery-1.9.1.js"></script>

<!-- Version minified del css de bootstrap 3.4 -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Latest compiled JavaScript for boostrap -->
<script src="js/bootstrap.min.js"></script>

<!-- CSS de la vista -->
<link rel="stylesheet" href="css/login.css">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
