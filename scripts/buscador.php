<?php
session_start();
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

if (!isset($_SESSION['cliente'])) {
    echo 'no hay sesion';

    if(!isset($_POST['buscar'])) {
        echo "Por favor, introduce el nombre de la empresa";
    } else {
        $buscar = $_POST['buscar'];
        if(($buscar == null)) {
            echo "Por favor, introduce el nombre de la empresa";
            
        } else {
            $_SESSION['cliente'] = $_POST['buscar'];
            $buscar = $_POST['buscar'];

            $SQL_READ = "SELECT * FROM clientes WHERE nombreCliente LIKE '%".$buscar."%'";
            $sql_query = mysqli_query($conectar,$SQL_READ);
            
        }
    }
    
} else {
    echo $SESSION['cliente'];

    // $SQL_READ = "SELECT * FROM clientes WHERE nombreCliente LIKE '%".$buscar."%'";
    // $sql_query = mysqli_query($conectar,$SQL_READ);

}

