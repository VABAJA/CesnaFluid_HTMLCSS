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

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarVehiculo"])) {

    $registroVehiculos = "INSERT INTO vehiculos (nombreCliente, vehiculo, vehiculopin, km, volumen, vacum)"
        . "VALUES('" . $nombreCliente . "','" . $vehiculo . "','" . $vehiculopin . "','" . $km . "','" . $volumen . "','" . $vacum . "')";

    if (mysqli_query($conexion, $registroVehiculos)) {
        echo "<script> alert ('Vehículo registrado con éxito');
        window.location='../../paginas/vehiculos.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../../paginas/vehiculos.php'</script>";
    }
    $AsignaVarVehiculos = "UPDATE clientes SET id_vehiculos=id WHERE id_vehiculos=0";
    $sql_query = mysqli_query($conexion, $AsignaVarVehiculos);
}

//$querty=mysqli_query($conexion,$querty);
?>


