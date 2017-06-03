<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
 * El salt o IV es generado aleatoriamente, este scrip solo sirve para genear passwords ya que cada interacion dara un output diferente
 * no obstante el output contiene una version cifrada del salt que permite desencryptar con solo la contraseña y la expresion
 * de su costo
 *
 * el costo representa los recursos necesarios para crear una contraseña, digitalocean con su droplet de $5 funciona con un costo de 10 sin
 * impactar de manera critica el desempeño del servidor
 */

//El script no siempre es llamado desde la api por lo que debe por trabajar de forma independiente
require_once(dirname(__FILE__) . "/../query/select_variables_configuracion.php");//Path absoluto del archivo, considera la direccion de esta libreria y no la del scrip que la llamo

function encrypt_password($configuraciones_sistema, $password)
	{
	if($configuraciones_sistema['password_encrypt'] == "true")
		{
		$options = [
			'cost' => 10,
			//'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];

		$encrypted_password = password_hash($password, PASSWORD_BCRYPT, $options);//Retorna algo como $2y$8$n/NCRRvsSy4aPogHGYXA8uvbjU0Au99MFk3Ek5kkVJr1XTzCmkJXe
		}

	else
		{
		$encrypted_password = $password;
		}

	return $encrypted_password;
	}
?>
