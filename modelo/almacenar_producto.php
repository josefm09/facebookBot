<?php

	require '../class/gestion_productos.php';
	
	$producto = new productos();

	//if(isset($_POST['codigo_barras']) && isset($_POST['nombre']) && isset($_POST['costo']) && isset($_POST['acumulable']) && isset($_POST['id_imagen']) && isset($_POST['tipo_producto'])){
		
		$txt_nombre = $_REQUEST['txt_nombre'];
		$slt_tipo = $_REQUEST['slt_tipo'];
		$slt_categoria = $_REQUEST['slt_categoria'];
		$txt_codigo_barra = $_REQUEST['txt_codigo_barra'];
		$cantidad_consumible = $_REQUEST['cantidad_consumible'];
		$boolean_acumulable = $_REQUEST['boolean_acumulable'];
		$boolean_agrupamiento = $_REQUEST['boolean_agrupamiento'];
		$imagen_producto = $_REQUEST['imagen_producto'];
		$txt_iva = $_REQUEST['txt_iva'];
		$txt_ieps = $_REQUEST['txt_ieps'];
		$ingrediente = $_REQUEST['ingrediente'];
		$unidades = $_REQUEST['unidades'];
		$impuesto = $_REQUEST['impuesto'];
		$estatus = 1;
		$porcentaje = "";
		$id_producto = $producto->crear_producto($mysqli, $estatus, $txt_nombre, $slt_tipo, $slt_categoria, $txt_codigo_barra, $cantidad_consumible, $boolean_acumulable, $boolean_agrupamiento, $imagen_producto, $txt_iva, $txt_ieps, $id_empresa);
		
		foreach ($ingrediente as list($id_producto_ingrediente, $cantidad_ingrediente)) {
			
			$id_ingrediente = $producto->agregar_ingrediente_a_producto($mysqli, $id_producto, $id_producto_ingrediente, $cantidad_ingrediente);
			
		}
		
		foreach ($unidades as list($id_unidad_original, $cantidad_unidad, $id_unidad_conversion)) {
			
			$id_producto_unidad_medida = $producto->agregar_unidad_a_producto($mysqli, $id_producto, $id_unidad_original, $cantidad_unidad, $id_unidad_conversion);
			
		}
		
		foreach ($impuesto as &$id_impuesto){
			
			if($id_impuesto == 1){
				$porcentaje = $txt_iva;
			}else{
				$porcentaje = $txt_ieps;
			}
			
			$id_producto_impuesto = $producto->agregar_producto_impuesto($mysqli, $id_producto, $id_impuesto, $porcentaje);
		}
		
		
		echo $id_producto;
		
//	}

?>