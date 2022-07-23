<!-- REGISTRO DE DISPOSITIVO NUEVO  -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";


$nombreCliente = $_POST['nombreCliente'];
$pinRFID = $_POST['pinRFID'];
$ubicacion = $_POST['ubicacion'];
$vacum = $_POST['vacum'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarDispositivo"])) {

    $registroDispositivos = "INSERT INTO dispositivos (nombreCliente, pinRFID, ubicacion, vacum)"
        . "VALUES('" . $nombreCliente . "','" . $pinRFID . "','" . $ubicacion . "','" . $vacum . "')";

    if (mysqli_query($conexion, $registroDispositivos)) {
        echo "<script> alert ('Dispositivo registrado con éxito');
        window.location='../../paginas/dispositivos.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../../paginas/dispositivos.php'</script>";
    }
    $AsignaVarDispositivo = "UPDATE clientes SET id_dispositivos=id WHERE id_dispositivos=0";
    $sql_query = mysqli_query($conexion, $AsignaVarDispositivo);
}

//$querty=mysqli_query($conexion,$querty);

?>

