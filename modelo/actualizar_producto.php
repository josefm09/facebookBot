<?php

	require '../class/gestion_productos.php';
	
	$producto = new productos();

	if(isset($_POST['id_producto']) && isset($_POST['codigo_barras']) && isset($_POST['nombre']) && isset($_POST['costo']) && isset($_POST['acumulable']) && isset($_POST['id_imagen']) && isset($_POST['tipo_producto'])){
		
		$id_producto = $_POST['id_producto'];
		$estatus = $_POST['estatus'];
		$codigo_barras = $_POST['codigo_barras'];
		$nombre = $_POST['nombre'];
		$id_tipo_producto = $_POST['tipo_producto'];
		$costo = $_POST['costo'];
		$boolean_acumulable = $_POST['acumulable'];
		$id_imagen = $_POST['id_imagen'];
		$id_empresa = $_SESSION['id_empresa'];
		
		$id_producto = $producto->crear_producto($mysqli, $codigo_barras, $nombre, $costo, $boolean_acumulable, $id_empresa, $id_tipo_producto, $id_imagen);
		echo $id_producto;
	}

?>