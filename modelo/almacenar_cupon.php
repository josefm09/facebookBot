<?php

	require '../class/gestion_cupon.php';
	require '../fuction/random_string_openssl.php';
	
	$cupon = new cupon();
	$random_string_openssl = new random_string_openssl();
	
	$key_random = $random_string_openssl($mysqli,$longitud_caracteres);
	
	$id_cupon = $cupon->crear_cupon($mysqli, $estatus, $txt_nombre, $slt_tipo, $slt_categoria, $txt_codigo_barra, $cantidad_consumible, $boolean_acumulable, $boolean_agrupamiento, $imagen_producto, $txt_iva, $txt_ieps, $id_empresa);
	
	echo $id_producto;
		

?>