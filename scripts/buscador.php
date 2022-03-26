<?php
//cadena de conexion
include_once './database.php';

if(isset($_GET['buscar'])) {
  $busqueda =$_GET['busqueda'];

  $consulta = $con->query("SELECT * FROM clientes WHERE nombreCliente LIKE '%$busqueda%'");

  // while ($row = $consulta->fetch_array()) {
    // echo $row['nombreCliente'].'<br>';
    echo "exito";
  }
}
?>