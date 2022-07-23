<!-- DASHBOARD  -->

<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');
//verificación de conexión
if (mysqli_connect_errno($conectar)) {
  echo "Conexión Fallida" . mysqli_connect_error();
} else {

  if (isset($_SESSION['cliente'])) {

   if($_SESSION['cliente'] = $_POST['buscar']) { 
    
     $resultadoDashboard = mysqli_query($conectar, "SELECT id_usuarios, id_dispositivos, id_vehiculos, id_tickets
                                           FROM clientes Cli
                                           INNER JOIN usuarios Usu ON Cli.id_usuarios = Usu.usuarios_id
                                           INNER JOIN dispositivos Dis ON Cli.id_dispositivos = Dis.dispositivos_id
                                           INNER JOIN vehiculos Veh ON Cli.id_vehiculos = Veh.vehiculos_id
                                           INNER JOIN tickets Tic ON Cli.id_tickets = Tic.tickets_id");
     $sql_query = mysqli_query($conectar,$resultadoDashboard);
   }
  }
} 
?>


<!-- BÚSQUEDA DE CLIENTES  -->
<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión

if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();

} else {
// Busca al cliente y muestra solo los datos de ese cliente
    if (isset($_SESSION['cliente'])) {

        $resultado_clientes = mysqli_query($conectar, "SELECT id, nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2 FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'");

    } else {

        // echo "No hay sesión";

    }
}

?>

<!-- Búsqueda de USUARIOS  -->
<?php
session_start();

//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_usuarios FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_usuarios'];

    //die(print_r($ide));
    $resultado_usuarios = mysqli_query($conectar, "SELECT usuario, usuariopin, nomusuario, correoUsuario, fechareg FROM usuarios WHERE usuarios_id = '$ide'");

}
?>

<!-- Búsqueda de DISPOSITIVOS  -->
<?php
session_start();

//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
/* if (isset($_SESSION['cliente'])) {

$resultado_dispositivos = mysqli_query($conectar, "SELECT locacion, vacum, cliente_id, dispositivos_id, id_configuracion FROM dispositivos INNER JOIN clientes ON clientes.id_usuarios = usuarios.usuarios_id WHERE usuarios_id LIKE '%" . $_SESSION['id_usuarios'] . "%'");

} */
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_dispositivos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_dispositivos'];

    //die(print_r($ide));
    $resultado_dispositivos = mysqli_query($conectar, "SELECT pinRFID, ubicacion, vacum FROM dispositivos WHERE dispositivos_id = '$ide'");

}
?>


<!-- Búsqueda de Vehículos  -->

<?php
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_vehiculos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_vehiculos'];

    //die(print_r($ide));
    $resultado_vehiculos = mysqli_query($conectar, "SELECT nombreCliente, vehiculo, vehiculopin, km, volumen, vacum FROM vehiculos WHERE vehiculos_id = '$ide'");

}
?>
<!-- Búsqueda de Tickets  -->

<?php
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_tickets FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_tickets'];

    //die(print_r($ide));
    $resultado_tickets = mysqli_query($conectar, "SELECT ticket_number, _date, tickets_id FROM tickets WHERE tickets_id = '$ide'");

}
?>

<!-- Búsqueda de Contenedores  -->

<?php
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_contenedores FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_contenedores'];

    //die(print_r($ide));
    $resultado_contenedores = mysqli_query($conectar, "SELECT contenedor_id FROM contenedores WHERE contenedor_id = '$ide'");

}
?>