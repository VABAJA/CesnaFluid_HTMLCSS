<?php
//CONEXIÓN A BASE DE DATOS Y DECLARACIÓN DE VARIABLES

$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$id_cli = $_POST['id_cli'];

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

$tablaVehiculos = "SELECT * FROM vehiculos";

$vehiculoDefinido = "SELECT * FROM vehiculos
INNER JOIN clientes ON vehiculos.vehiculos_id=clientes.id_vehiculos
AND clientes.nombreCliente
LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_vehiculos = mysqli_query($conexion, $tablaVehiculos);
    
} else {
    $lista_vehiculos = mysqli_query($conexion, $vehiculoDefinido);


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

$AsignaID = "UPDATE vehiculos SET vehiculos_id='$id_cli' WHERE vehiculos_id=0";

$sql_query = mysqli_query($conexion, $AsignaID);

?>
