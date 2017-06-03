<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Genera un string pseudo aleatorio usando openssl, la funcion espera un integer que defina su longitud
*
* Retorna algo como 1fe5b5a10bc894e16403c65c92e5de3a1aa764acc8e69281144ed9db10eb83ac608c1c6e30261e3a
*/

function random_string_openssl($output_length)
  {
  //Longitud del string en carecteres binarios
  $length = 1000;

  //Genera una cadena de valores binarios de la longitud dada
  $random_string = openssl_random_pseudo_bytes($length);

  //Convierte de binario a hexadecimal esto produce un incremento en caracteres similar a la conversion a base64
  $random_string = bin2hex($random_string);

  //Recorta el string dejando solo los primeros caracteres indicados por $output_length
	$characters = str_split($random_string);
	$total = count($characters);
	$sobrantes = $total - $output_length;
	$random_string_recortado = substr($random_string, 0, -$sobrantes);

  return $random_string_recortado;
  }
?>
