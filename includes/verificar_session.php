<?php
/*
Verifica que el usuario tenga una session activa y de no ser asi lo manda al formulario de login.
*/

//Indica que se trabaja con sessiones
session_start();

//Si no hay session activa redirecciona al la pagina de login
if(!isset($_SESSION['userid']))
	{
	//Path absoluto del archivo, considera la direccion de esta libreria y no la del scrip que la llamo
	header("location:dirname(__FILE__) . '/../login.php");
	}
	
$id_usuario = $_SESSION['userid']; //Toma el ID del usuario desde la variable global, esto sera nueva variable sera llamada directamente desde otros scripts
?>