<!-- Búsqueda de Contenedores  -->

<?php
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $first = "SELECT id_contenedores FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_contenedores'];

    //die(print_r($ide));
    $resultado_contenedores = mysqli_query($conectar, "SELECT nombreCliente, contenedores_id, contenedorUbicacion, vacum, volumen FROM contenedores WHERE contenedores_id = '$ide'");
}
?>