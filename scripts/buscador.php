<?php
//cadena de conexion
include_once '../scripts/connection.php';

if(isset($_GET['buscar'])) {
  $busqueda = $_GET['busqueda'];

  $consulta = $con->query("SELECT * FROM clientes WHERE nombreCliente LIKE '%$busqueda'");

  while ($row = $consulta->fetch_array()) {
    echo $row[nombreCLiente'].'<br>';
    }
  }
?>