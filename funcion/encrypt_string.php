<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Encrypta un string usando AES 256 en modo CBC con un IV aleatorio de 138 bits
*
* Retorna un string en formato hexadecimal que contiene el IV y el string
* encryptado concatenados
*
* Ejemplo del output para "algo"
* 416956a13b19db4f1d9e1d766fa0617eb15ab6557e40475f8a04f11a32b66d45
*/

function encrypt_string($texto)
  {
  //Parametros para la funcion de encryptacion
  $algoritmo_encryptacion = "AES-256-CBC";
  $password = "e8dd15a842df63d4f9715350b♫127435ecf6c3d4bdd88a29d61f667acb0e3e251";

  //Genera un IV
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$iv_hex = bin2hex($iv);//Convierte el IV a formato Hexadecimal

	//Encrypta el texto
	$encryptedMessage = openssl_encrypt($texto, $algoritmo_encryptacion, $password, 1, $iv);

	//Texto encryptado convertido a Hexadecimal
	$encryptedMessageHex = bin2hex($encryptedMessage);

	//Se contactena el Hexadecimal del IV junto al Hexadecimal del texto encryptado
	$concatenated_iv_encryptedtext= "$iv_hex$encryptedMessageHex";

  return $concatenated_iv_encryptedtext;
  }
?>
