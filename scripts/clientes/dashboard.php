<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión

if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
} else {
    // Busca al cliente y muestra solo los datos de ese cliente
    if (isset($_SESSION['cliente'])) {

        $clienteDashboard = mysqli_query($conectar, "SELECT * FROM clientes LIKE '%".$_SESSION['cliente']."%'");


    }
}

?>