<!-- REGISTRO DE CONTENEDOR NUEVO -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreContenedor = $_POST['nombreContenedor'];
$contenedorUbicacion = $_POST['contenedorUbicacion'];
$volumen = $_POST['volumen'];
$vacum = $_POST['vacum'];
$contenedores_id = $_POST['contenedores_id'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarContenedor"])) {

    $registroContenedor = "INSERT INTO contenedores (nombreContenedor, contenedorUbicacion, volumen, vacum, contenedores_id)"
        . "VALUES('" . $nombreContenedor . "','" . $contenedorUbicacion . "','" . $volumen . "','" . $vacum . "','" . $contenedores_id . "')";

    if (mysqli_query($conexion, $registroContenedor)) {
        echo "<script> alert ('Contenedor registrado con éxito');
        window.location='../../paginas/contenedores.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../../paginas/contenedores.php'</script>";
    }
}

//$querty=mysqli_query($conexion,$querty);

?>