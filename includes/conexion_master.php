<?PHP
$mysqli = new mysqli('localhost', 'hackathon_master', "qveHxCR367@DBmTvmaJoa", 'Hackathon_cd');

mysqli_set_charset($mysqli, "utf8");

//Revisa que la conexion sea correcta
if (mysqli_connect_errno())
    {
    printf("La conexion fallo: %s\n", mysqli_connect_error());
    exit();
    }
?>
