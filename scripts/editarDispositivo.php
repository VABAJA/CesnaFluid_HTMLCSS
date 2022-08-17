<?php
session_start();
// include './conexion.php';

$conectar = include './conexion.php';
$buscar = $_POST['buscar'];

if (isset($_SESSION['cliente'])) {
    // echo $_SESSION['cliente'];
    $SQL_READ = "SELECT * FROM clientes, dispositivos WHERE clientes.id_dispositivos = dispositivos.dispositivos_id";
    $sql_query = mysqli_query($conectar, $SQL_READ);
}
 