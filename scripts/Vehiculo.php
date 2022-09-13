<!-- REGISTRO DE VEHÍCULO NUEVO -->
<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreCliente = $_POST['nombreCliente'];
$vehiculo = $_POST['vehiculo'];
$vehiculopin = $_POST['vehiculopin'];
$km = $_POST['km'];
$volumen = $_POST['volumen'];
$vacum = $_POST['vacum'];
$vehiculos_id = $_POST['vehiculos_id'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

// TABLA VEHICULOS
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_vehiculos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_vehiculos'];

    //die(print_r($ide));
    $resultado_vehiculos = mysqli_query($conectar, "SELECT nombreCliente, vehiculo, vehiculopin, km, volumen, vacum, vehiculos_id FROM vehiculos WHERE vehiculos_id = '$ide'");
}

// NUEVO REGISTRO VEHICULOS

if (isset($_POST["ingresarVehiculo"])) {

    $registroVehiculos = "INSERT INTO vehiculos (nombreCliente, vehiculo, vehiculopin, km, volumen, vacum, vehiculos_id)"
        . "VALUES('" . $nombreCliente . "','" . $vehiculo . "','" . $vehiculopin . "','" . $km . "','" . $volumen . "','" . $vacum . "','" . $vehiculos_id . "')";

    if (mysqli_query($conexion, $registroVehiculos)) {
        echo "<script> alert ('Vehículo registrado con éxito');
        window.location='../paginas/vehiculos.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../paginas/vehiculos.php'</script>";
    }

}

$AsignaID = "UPDATE vehiculos SET vehiculos_id='$id_cli' WHERE rol=0";

$sql_query = mysqli_query($conexion, $AsignaID);

?>

