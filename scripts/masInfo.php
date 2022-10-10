<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");


//REPORTES
$tablaReporte = "SELECT * FROM clientes
INNER JOIN usuarios ON usuarios.usuarios_id = clientes.id_usuarios
INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
INNER JOIN tickets ON tickets.tickets_id = clientes.id_tickets
INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores
 ";
$reporteDefinido = "SELECT * FROM clientes
INNER JOIN usuarios ON usuarios.usuarios_id=clientes.id_usuarios
INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
INNER JOIN tickets ON tickets.tickets_id = clientes.id_tickets
INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores

 AND clientes.nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_reportes = mysqli_query($conexion, $tablaReporte);
} else {

    $lista_reportes = mysqli_query($conexion, $reporteDefinido);
}

// Busca al cliente y muestra solo los datos de ese cliente

//DESPLIEGA MÁS INFORMACIÓN EN CLIENTES

$tabla_masinfo = "SELECT * FROM clientes
INNER JOIN usuarios ON clientes.id_usuarios = usuarios.usuarios_id
WHERE clientes.nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'" ;

if (isset($_SESSION['cliente'])) {

    $resultado_info = mysqli_query($conexion, $tabla_masinfo);
} else {

    // echo "No hay sesión";

}

// REGISTRO DE TICKETS
$tablaTickets = "SELECT * FROM clientes
INNER JOIN tickets
ON tickets.tickets_id=clientes.id_tickets";

$ticketDefinido = "SELECT * FROM clientes
INNER JOIN tickets 
ON tickets.tickets_id=clientes.id_tickets
AND clientes.nombreCliente
LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_tickets = mysqli_query($conexion, $tablaTickets);
    
} else {
    $lista_tickets = mysqli_query($conexion, $ticketDefinido);


}
?>