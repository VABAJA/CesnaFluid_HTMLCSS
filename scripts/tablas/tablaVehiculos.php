<!-- Búsqueda de Vehículos  -->

<?php
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_vehiculos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_vehiculos'];

    //die(print_r($ide));
    $resultado_vehiculos = mysqli_query($conectar, "SELECT nombreCliente, vehiculo, vehiculopin, km, volumen, vacum FROM vehiculos WHERE vehiculos_id = '$ide'");
}
?>