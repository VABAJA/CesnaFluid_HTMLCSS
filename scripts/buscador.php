<?php
session_start();

//cadena de conexion
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

if(!isset($_POST['buscar'])) {
    $_POST['buscar'] = "";
    echo "Por favor, introduce el nombre de la empresa";
} else {
    
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$SQL_READ = "SELECT * FROM clientes WHERE nombreCliente LIKE '%".$buscar."%'";

$sql_query = mysqli_query($conectar,$SQL_READ);

    


?>
    
   