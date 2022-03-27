<?php
//varaible de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}


$resultado = mysqli_query($conectar, "SELECT * FROM usuarios");
?>