<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Desencrypta un string usando AES 256 en modo CBC con un IV aleatorio de 138 bits
*
* El string deve contener el IV y el cipher text para que esta funcion pueda
* funcionar apropiadamente
*
* Ejemplo del output para "416956a13b19db4f1d9e1d766fa0617eb15ab6557e40475f8a04f11a32b66d45"
* algo
*/

function decrypt_string($cipher_text)
  {
  //Parametros para la funcion de desencryptacion
  $algoritmo_encryptacion = "AES-256-CBC";
  $password = "e8dd15a842df63d4f9715350b♫127435ecf6c3d4bdd88a29d61f667acb0e3e251";

  //Convierte el valor a binario
  $cipher_text = hex2bin($cipher_text);

  //Extrae el IV del string que siempre son los primeros 16 caracteres
  $characters = str_split($cipher_text);
  $total = count($characters);
  $sobrantes = $total - 16;
  $iv = substr($cipher_text, 0, -$sobrantes);

  //Extrae el texto encryptado del string el cual es todo lo que sigue al IV
  $characters = str_split($cipher_text);
  $total = count($characters);
  $sobrantes = $total - 16;
  $encrypted = substr($cipher_text, 16, $total);

  $texto_plano = openssl_decrypt($encrypted, $algoritmo_encryptacion, $password, 1, $iv);

  return $texto_plano;
  }
?>
