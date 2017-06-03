<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Metodo estandarizado para crear el contenido dinamico de los dropdown que contiene un valor en el primer elemento del drop down
* el cual se encuentra inactivo y es mostrado por default, esto para que exita un valor que pueda ser reconocido desde base de datos
*/

$total_elementos = count($elementos_encontrados);
$contador_elementos_encontrados = 1;

//Placeholder
echo '<option value="'.$valor.'" disabled selected>'.$placeholder.'</option>';

while($total_elementos >= $contador_elementos_encontrados)
	{
	echo '<option value="'.$elementos_encontrados[$contador_elementos_encontrados][0].'">'.$elementos_encontrados[$contador_elementos_encontrados][1].'</option>';	
	
	$contador_elementos_encontrados++;
	}
?>