<?php

	//if(isset($_REQUEST['keyword'])){
		
		require '../class/gestion_productos.php';
		
		$productos = new productos();
			
		$id_sucursal = $_SESSION['id_sucursal'];
		$estatus = 2;
		
		$lista_productos = $productos->consultar_productos_por_nombre($mysqli, $id_sucursal, $estatus);
		
		header('Content-Type: application/json');
		echo json_encode($lista_productos);
		// for($i = 0; $i < count($lista_productos); $i++){
			// echo '<li class="list-group-item">'.$lista_productos[$i]['id_producto']." - ".$lista_productos[$i]['nombre'].'</li>';			
		// }
	//}		
?>