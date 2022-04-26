<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
} else {
  // echo 'se conecta';
  $resultado = mysqli_query($conectar, "SELECT * FROM clientes");
  $sql_query = mysqli_query($conectar,$SQL_READ);
}


