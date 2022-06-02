<!-- Búsqueda en DASHBOARD  -->
<?php
// session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}
// } else {
  // echo 'se conecta';
  // $resultado = mysqli_query($conectar, "SELECT * FROM clientes"); , Cli.nombreCliente, Cli.contacto,Cli.id_cliente, 
  $resultado_clientes = mysqli_query($conectar, "SELECT * FROM clientes");
                                        // -- INNER JOIN usuarios ON clientes.id_usuarios = usuarios.usuarios_id
                                        // -- INNER JOIN dispositivos ON clientes.id_dispositivos = dispositivos.dispositivos_id
                                        // -- INNER JOIN vehiculos ON clientes.id_vehiculos = vehiculos.vehiculos_id
                                        // -- INNER JOIN tickets ON clientes.id_tickets = tickets.tickets_id
  // $sql_query = mysqli_query($conectar,$SQL_READ);
?>

<!-- Búsqueda de Clientes  -->

<?php
// session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}
// } else {
  // echo 'se conecta';
  // $resultado = mysqli_query($conectar, "SELECT * FROM clientes"); , Cli.nombreCliente, Cli.contacto,Cli.id_cliente, 
  $resultado_clientes = mysqli_query($conectar, "SELECT * FROM clientes");
                                        // -- INNER JOIN usuarios ON clientes.id_usuarios = usuarios.usuarios_id
                                        // -- INNER JOIN dispositivos ON clientes.id_dispositivos = dispositivos.dispositivos_id
                                        // -- INNER JOIN vehiculos ON clientes.id_vehiculos = vehiculos.vehiculos_id
                                        // -- INNER JOIN tickets ON clientes.id_tickets = tickets.tickets_id
  // $sql_query = mysqli_query($conectar,$SQL_READ);
?>

<!-- Búsqueda de Dispositivos  -->
<?php
//varaible de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}


$resultado_dispositivos = mysqli_query($conectar, "SELECT * FROM dispositivos");
?>

<!-- Búsqueda de Usuarios  -->
<?php
//varaible de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}


$resultado_usuarios = mysqli_query($conectar, "SELECT * FROM usuarios");
?>

<!-- Búsqueda de Vehículos  -->

<?php
//varaible de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}


$resultado_vehiculos = mysqli_query($conectar, "SELECT * FROM vehiculos");
?>

<!-- Búsqueda de Contenedores  -->

<?php
//varaible de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
}


$resultado_contenedores = mysqli_query($conectar, "SELECT * FROM contenedores");
?>