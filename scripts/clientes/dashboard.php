<?php
session_start();
// echo session_id();

$sesion = session_id();

echo $sesion;

/* if(isset($_SESSION[$sesion])){
    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $SQL_READ = "SELECT * FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";
    $clienteDashboard = mysqli_query($conectar, $SQL_READ);
} */
// $buscar = $_POST['buscar'];

// $sesion = $_SESSION['rol'] == $_SESSION['cliente'];
// $session == true;

// if (!isset($_SESSION['cliente'])) {
    // echo $_SESSION['cliente'];
    // $SQL_READ = "SELECT * FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";
    // $clienteDashboard = mysqli_query($conectar, $SQL_READ);

    // $_SESSION['cliente'] = $_POST['buscar'];
// }
