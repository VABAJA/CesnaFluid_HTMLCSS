<!-- Búsqueda de DISPOSITIVOS  -->
<?php
session_start();

//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
/* if (isset($_SESSION['cliente'])) {

$resultado_dispositivos = mysqli_query($conectar, "SELECT locacion, vacum, cliente_id, dispositivos_id, id_configuracion FROM dispositivos INNER JOIN clientes ON clientes.id_usuarios = usuarios.usuarios_id WHERE usuarios_id LIKE '%" . $_SESSION['id_usuarios'] . "%'");

} */
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_dispositivos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_dispositivos'];

    //die(print_r($ide));
    $resultado_dispositivos = mysqli_query($conectar, "SELECT nombreCliente, pinRFID, ubicacion, vacum FROM dispositivos WHERE dispositivos_id = '$ide'");
}
?>
