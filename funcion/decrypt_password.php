<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* $password es dada por el usuario en texto plano, $password_database es la version encryptada que esta en base de datos,
*
* los primeros caracteres representan el costo del algorithmo y lo demas es la mezcla de la contraseña en texto plano y un
* salt aleatorio (IV)
*/

//El script no siempre es llamado desde la api por lo que debe por trabajar de forma independiente
require_once(dirname(__FILE__) . "/../query/select_variables_configuracion.php");//Path absoluto del archivo, considera la direccion de esta libreria y no la del scrip que la llamo

function decrypt_password($configuraciones_sistema, $password, $password_database)
	{
	//El sistema usa contraseñas encryptadas
	if($configuraciones_sistema['password_encrypt'] == "true")
		{
		//Si la contraseña dada por el usuario es compatible
		if (password_verify($password, $password_database))
			{
			$password_correcta = 1;//Booleano representa true
			}

		else
			{
			$password_correcta = 0;//Booleano representa false
			}
		}


	else
		{
		//Si la contraseña dada por el usuario es compatible
		if($password == $password_database)
			{
			$password_correcta = 1;//Booleano representa true
			}

		else
			{
			$password_correcta = 0;//Booleano representa false
			}
		}

	return $password_correcta;
	}
?>
