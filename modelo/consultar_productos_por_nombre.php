<?php

	//if(isset($_REQUEST['keyword'])){
		
		require '../class/gestion_productos.php';
		
		$productos = new productos();
		
		//$nombre_producto = $_REQUEST['keyword'];
		$id_sucursal = $_SESSION['id_sucursal'];
		$nombre_producto = $_REQUEST['q'];
		$estatus = 1;
		
		$lista_productos = $productos->consultar_productos_por_nombre($mysqli,$nombre_producto, $id_sucursal, $estatus);
		
		header('Content-Type: application/json');
		echo json_encode($lista_productos);
		// for($i = 0; $i < count($lista_productos); $i++){
			// echo '<li class="list-group-item">'.$lista_productos[$i]['id_producto']." - ".$lista_productos[$i]['nombre'].'</li>';			
		// }
	//}
?>