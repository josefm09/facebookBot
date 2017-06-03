<?php
session_start();

$_SESSION['userid'] = false;
$_SESSION['prioridad'] = false;
$_SESSION['mobile'] = false;

//require_once "includes/librerias.php";
require_once "../includes/conexion.php";

//Tomal el ip del usuario que accede al formulario de login
$ipaddress = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

//Detecta celulares y almacena un booleano como llave de session
$useragent=$_SERVER['HTTP_USER_AGENT']; //Datos sobre el dispositivo y navegador usado por el usuario

//Detecta si esta usando un dispositivo movil
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{
	$_SESSION['mobile'] = "true";
	}

//Si no esta usando un celular (o no es reconocido)
else
	{
	$_SESSION['mobile'] = "false";
	}

//Obtine el nombre del navegador
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
}

//Si la session no existe
if($_SESSION['userid'] == false)
        {
        //Si se activa el  evento de envio del formulario
        if(isset($_POST['login']))
                {

                $usuario = $_POST['user'];
                $password = $_POST['password'];

                //Inicializa la variable que contendra el id del usuario, de existir
                $id_usuario = 0;

                //Inicio del query preparado
                //Busca coincidencias en la tabla usuarios bajo los criterios de nombre de usuario y contrase�a
                $query = "SELECT id_usuario, password, prioridad FROM usuarios WHERE usuario = ? and estatus = 'activo'";
                if ($stmt = $mysqli->prepare($query))
					{
					//Asigna las variables para el query
					$stmt->bind_param("s", $usuario);

					//Ejecuta el query
					$stmt->execute();

					//Asigna el resultado a una variable
					$stmt->bind_result($id_usuario, $password_database, $prioridad);

					//obtener valor
					$stmt->fetch();

					//Cierra el query
					$stmt->close();
					}

				//Encrypta la contraseña para su verificacion
				require "../modelos/decrypt_password.php";

                if($id_usuario > 0 AND $password_correcta === 1) //El usuario existe y la contrase�a coincide
                        {

                        $_SESSION['userid'] = $id_usuario; //Asigna el id_usuario como llave de session
						$_SESSION['prioridad'] = $prioridad; //La prioridad que tiene el usuario en el sistema

                        $timestamp =time(); //Timestamp de unix actual

						$browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

						//Genera un strin pseudo aleatorio usando openssl
						require "../funcion/random_string_openssl.php";
						$random_string = random_string_openssl(40);

                        //Almacena el timestamp de la session actual y el ip desde donde accedio
                        $results = mysqli_query($mysqli,"INSERT INTO expirarsession (id_usuario, ip, session_token, user_agent, browser, timestamp)
                                                                          VALUES
                                                                         ('$id_usuario', '$ipaddress', '$random_string', '$useragent', '$browser', '$timestamp')") or die(mysqli_error($mysqli));
						header("location:../index.php"); //Redireccion tras crear la session
                        }

                else
                        {
                        ?>
                        <div class="alert alert-warning alert-dismissible" role="error">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Su usuario o password son incorrectos. Intente nuevamente.
                        </div>
                        <?php
                        }
                }
        }
else
        {
    header("location:../index.php"); //Redireccion si ya existe una session
        }
?>
