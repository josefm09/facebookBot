<?php
	
	require "../class/gestion_cliente.php";
		
	$clientes = new cliente();
	
	//$id_sucursal = $_SESSION['id_sucursal'];
	$id_cliente = $variables_recibidas['id_cliente'];
	//$tipo_busqueda = $_REQUEST['tipo_busqueda'];
	//$datos_cliente = array();
	$estatus = 1;
	
	//Posteriormente de ser un producto elaborado la selección, se llamará a la funcion que solo devuelva ingredientes
	$cliente = $clientes->consulta_cliente_id($mysqli, $id_cliente, $estatus);
	$domicilios = $clientes->consulta_domicilio_estado_municipio_estado_cliente_id($mysqli, $id_cliente, $estatus);
	$telefonos = $clientes->consulta_telefono_cliente_id($mysqli, $id_cliente, $estatus);
	$correos = $clientes->consulta_correo_cliente_id($mysqli, $id_cliente, $estatus);
	$factura_datos = $clientes->consulta_factura_datos_cliente_id($mysqli, $id_cliente, $estatus);
	
	$datos_cliente[] = Array(
		"cliente" => $cliente,
		"domicilios" => $domicilios, 
		"telefonos" => $telefonos, 
		"correos" => $correos, 
		"factura_datos" => $factura_datos
	); 
	
	header('Content-Type: application/json');
	
	echo json_encode($datos_cliente);
?>