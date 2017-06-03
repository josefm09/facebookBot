<?PHP

require "../class/gestion_trabajador.php";
$trabajador = new trabajador(); //Inicializa la clase

$estatus = 1;

//Tomamos el valor de las variables recibidas
//Datos de trabajador
$nombre_trabajador= $variables_recibidas['nombre_trabajador'];
$apellido_paterno_trabajador= $variables_recibidas['apellido_paterno_trabajador'];
$apellido_materno_trabajador= $variables_recibidas['apellido_materno_trabajador'];
$calle_trabajador= $variables_recibidas['calle_trabajador'];
$colonia_trabajador= $variables_recibidas['colonia_trabajador'];
$numero_trabajador= $variables_recibidas['numero_trabajador'];
$correo_trabajador= $variables_recibidas['correo_trabajador'];
$lada_trabajador= $variables_recibidas['lada_trabajador'];
$telefono_trabajador= $variables_recibidas['telefono_trabajador'];
$tipo_telefono_trabajador= $variables_recibidas['tipo_telefono_trabajador'];
$ciudad_trabajador= $variables_recibidas['ciudad_trabajador'];
$estado_trabajador= $variables_recibidas['estado_trabajador'];
$municipio_trabajador= $variables_recibidas['municipio_trabajador'];
$usuario_trabajador= $variables_recibidas['usuario_trabajador'];
$tipo_trabajador= $variables_recibidas['tipo_trabajador'];
$id_imagen_trabajador= $variables_recibidas['imagen'];
$roles_trabajador= $variables_recibidas['roles_trabajador'];
//Datos de primer referencia
$nombre_referencia1_trabajador= $variables_recibidas['nombre_referencia1_trabajador'];
$apellido_paterno_referencia1_trabajador= $variables_recibidas['apellido_paterno_referencia1_trabajador'];
$apellido_materno_referencia1_trabajador= $variables_recibidas['apellido_materno_referencia1_trabajador'];
$calle_referencia1_trabajador= $variables_recibidas['calle_referencia1_trabajador'];
$colonia_referencia1_trabajador= $variables_recibidas['colonia_referencia1_trabajador'];
$numero_referencia1_trabajador= $variables_recibidas['numero_referencia1_trabajador'];
$correo_referencia1_trabajador= $variables_recibidas['correo_referencia1_trabajador'];
$lada_referencia1_trabajador= $variables_recibidas['lada_referencia1_trabajador'];
$telefono_referencia1_trabajador= $variables_recibidas['telefono_referencia1_trabajador'];
$tipo_telefono_referencia1_trabajador= $variables_recibidas['tipo_telefono_referencia1_trabajador'];
//Datos de segunda referencia
$nombre_referencia2_trabajador= $variables_recibidas['nombre_referencia2_trabajador'];
$apellido_paterno_referencia2_trabajador= $variables_recibidas['apellido_paterno_referencia2_trabajador'];
$apellido_materno_referencia2_trabajador= $variables_recibidas['apellido_materno_referencia2_trabajador'];
$calle_referencia2_trabajador= $variables_recibidas['calle_referencia2_trabajador'];
$colonia_referencia2_trabajador= $variables_recibidas['colonia_referencia2_trabajador'];
$numero_referencia2_trabajador= $variables_recibidas['numero_referencia2_trabajador'];
$correo_referencia2_trabajador= $variables_recibidas['correo_referencia2_trabajador'];
$lada_referencia2_trabajador= $variables_recibidas['lada_referencia2_trabajador'];
$telefono_referencia2_trabajador= $variables_recibidas['telefono_referencia2_trabajador'];
$tipo_telefono_referencia2_trabajador= $variables_recibidas['tipo_telefono_referencia2_trabajador'];

// if($_SESSION['privilegio_administrativo'] == 1){
	// $empresa_trabajador= $variables_recibidas['empresa_trabajador'];
// }
// else{
	// $empresa_trabajador= $_SESSION['id_empresa'];
// }

// if($_SESSION['privilegio_administrativo'] == 1 or $_SESSION['privilegio_administrativo'] == 2){
	// $sucursal_trabajador= $variables_recibidas['sucursal_trabajador'];
	// $trabajador_asignado = $variables_recibidas['trabajador_asignado'];
// }
// else{
	// $sucursal_trabajador= $_SESSION['id_sucursal'];
	// $trabajador_asignado = 1;
// }

//Verificar que todos los campos  esten rellenados
//Para trabajador
if($nombre_trabajador === "" or $apellido_paterno_trabajador === ""
or $apellido_materno_trabajador === "" or $calle_trabajador === ""
or $colonia_trabajador === "" or $numero_trabajador === ""
or $correo_trabajador === "" or $lada_trabajador === ""
or $telefono_trabajador === "" or $tipo_telefono_trabajador === ""
or $usuario_trabajador === "" or $tipo_trabajador === "")
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Hacen falta datos del trabajador.';
	}
//Para la primer referencia
if($nombre_referencia1_trabajador === ""
or $apellido_paterno_referencia1_trabajador === ""
or $apellido_materno_referencia1_trabajador === ""
or $calle_referencia1_trabajador === "" or $colonia_referencia1_trabajador === ""
or $numero_referencia1_trabajador === "" or $correo_referencia1_trabajador === ""
or $lada_referencia1_trabajador === "" or $telefono_referencia1_trabajador === ""
or $tipo_telefono_referencia1_trabajador === "")
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Hacen falta datos de la primer referencia.';
	}
//Para la segunda referencia
if($nombre_referencia2_trabajador === ""
or $apellido_paterno_referencia2_trabajador === ""
or $apellido_materno_referencia2_trabajador === ""
or $calle_referencia2_trabajador === ""
or $colonia_referencia2_trabajador === ""
or $numero_referencia2_trabajador === ""
or $correo_referencia2_trabajador === ""
or $lada_referencia2_trabajador === "" or $telefono_referencia2_trabajador === ""
or $tipo_telefono_referencia2_trabajador === "")
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Hacen falta datos de la segunda referencia.';
	}

//Si no hay errores
if($estatus_request !== 'error')
	{
	//Crea el usuario de sistema para le trabajador
	$id_usuario_trabajador = almacenar_usuario($mysqli, $usuario_trabajador, $nombre_trabajador, $apellido_paterno_trabajador, $apellido_materno_trabajador, $tipo_trabajador, $configuraciones_sistema, $id_usuario);

	if($id_usuario_trabajador != "user_taken")
		{
		$trabajador->relacionar_usuario_imagen($mysqli, $id_usuario_trabajador, $id_imagen_trabajador);
		//Crea al trabajador relacionandolo con el nuevo usuario de sistema
		$nuevo_id_nuevo = $trabajador->crear_trabajador($mysqli, $id_usuario_trabajador, $calle_trabajador, $numero_trabajador, $colonia_trabajador, $correo_trabajador, $telefono_trabajador, $tipo_telefono_trabajador, $lada_trabajador, $ciudad_trabajador, $estado_trabajador, $municipio_trabajador);

		// Crea las relaciones de usuario con empresa y sucursal
		// $nuevo_id_usuario_empresa= $trabajador-> relacionar_usuario_empresa($mysqli, $id_usuario_trabajador, $empresa_trabajador);
		// $nuevo_id_usuario_sucursal= $trabajador-> relacionar_usuario_sucursal($mysqli, $id_usuario_trabajador, $sucursal_trabajador, $trabajador_asignado);

		//Almacenado de primer referencia
		$id_correo_electronico_referencia1 = almacenar_correo_electronico($mysqli,$correo_referencia1_trabajador);
		$id_telefono_referencia1 = almacenar_telefono($mysqli, $telefono_referencia1_trabajador, $tipo_telefono_referencia1_trabajador, $lada_referencia1_trabajador);
		$id_domicilio_referencia1 = almacenar_domicilio ($mysqli, $numero_referencia1_trabajador, $colonia_referencia1_trabajador, $calle_referencia1_trabajador);
		$nuevo_id_nuevo_refencia1 = $trabajador->crear_referencia($mysqli, $nombre_referencia1_trabajador, $apellido_paterno_referencia1_trabajador, $apellido_materno_referencia1_trabajador, $id_correo_electronico_referencia1, $id_telefono_referencia1, $id_domicilio_referencia1);

		//Almacenado de segunda referencia
		$id_correo_electronico_referencia2 = almacenar_correo_electronico($mysqli,$correo_referencia2_trabajador);
		$id_telefono_referencia2 = almacenar_telefono($mysqli, $telefono_referencia2_trabajador, $tipo_telefono_referencia2_trabajador, $lada_referencia2_trabajador);
		$id_domicilio_referencia2 = almacenar_domicilio ($mysqli, $numero_referencia2_trabajador, $colonia_referencia2_trabajador, $calle_referencia2_trabajador);
		$nuevo_id_nuevo_refencia2 = $trabajador->crear_referencia($mysqli, $nombre_referencia2_trabajador, $apellido_paterno_referencia2_trabajador, $apellido_materno_referencia2_trabajador, $id_correo_electronico_referencia2, $id_telefono_referencia2, $id_domicilio_referencia2);

		//Relaciona las referencias con el usuario
		$trabajador->relacionar_usuario_referencia($mysqli, $id_usuario_trabajador, $nuevo_id_nuevo_refencia1);
		$trabajador->relacionar_usuario_referencia($mysqli, $id_usuario_trabajador, $nuevo_id_nuevo_refencia2);
		
		//Relacionar los roles que el trabajador selecciono
		$array_roles = json_decode($roles_trabajador,true);
		for($i=0;$i<count($array_roles);$i++)
		{ 
			$id_rol=$array_roles[$i];
			
			$trabajador->relacion_trabajador_rol($mysqli, $id_rol, $nuevo_id_nuevo);
		}

		$estatus_request = 'success';
		$respuesta_servidor = "El usuario <b>$usuario_trabajador</b> fue creado con exito.";
		}

	else
		{
		$estatus_request = 'error';
		$respuesta_servidor = "El usuario ya esta tomado.";
		}

	}

$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
echo json_encode($respuesta);
?>
