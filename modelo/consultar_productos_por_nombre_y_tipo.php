<?php
	
		require '../class/gestion_productos.php';
		
		$productos = new productos();
		
		$id_sucursal = $_SESSION['id_sucursal'];
		$nombre_producto = $_REQUEST['q'];
		$tipo_busqueda = $_REQUEST['tipo_busqueda'];
		$lista_productos = array();
		$tipo1 = 3;
		$estatus = 1;
		
		if($tipo_busqueda == 2){
			
			//$tipo_busqueda pertenece a productos elaborados, por lo tanto si esto ocurre
			//se llamará la función que devuelve ingredientes y productos preelborados
			$tipo2 = 4;
			$lista_productos = $productos->consultar_productos_por_nombre_y_dos_tipos($mysqli, $nombre_producto, $tipo1, $tipo2, $id_sucursal, $estatus);
		
		}else if($tipo_busqueda == 4){
			
			//Posteriormente de ser un producto elaborado la selección, se llamará a la funcion que solo devuelva ingredientes
			$lista_productos = $productos->consultar_productos_por_nombre_y_tipo($mysqli, $nombre_producto, $tipo1, $id_sucursal, $estatus);
			
		}
		
		header('Content-Type: application/json');
		
		echo json_encode($lista_productos);
		
?>