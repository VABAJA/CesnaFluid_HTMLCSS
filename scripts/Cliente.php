<?php
//CONEXIÓN A BASE DE DATOS Y DECLARACIÓN DE VARIABLES

$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$id_cli = $_POST['id_cli'];

$nombreCliente = $_POST['nombreCliente'];
$contacto = $_POST['contacto'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$razonSocial = $_POST['razonSocial'];
$direccion = $_POST['direccion'];
$telefono2 = $_POST['telefono2'];
$correo2 = $_POST['correo2'];
$contacto2 = $_POST['contacto2'];

$username = $_POST['username'];
$contrasena = $_POST['contrasena'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    // echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
// or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");


//LISTA REGISTRO DE CLIENTES
$all = "clientes.id_cli, clientes.nombreCliente, usuarios.usuario, dispositivos.nombreDispositivo, vehiculos.vehiculo, tickets.registroTicket, contenedores.nombreContenedor, clientes.id_usuarios, usuarios.usuarios_id, clientes.id_dispositivos, dispositivos.dispositivos_id, clientes.id_vehiculos, vehiculos.vehiculos_id, clientes.id_tickets, tickets.tickets_id, clientes.id_contenedores, contenedores.contenedores_id";

$tablaClientes = "SELECT $all FROM clientes 

INNER JOIN usuarios ON usuarios.usuarios_id = clientes.id_usuarios
INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
INNER JOIN tickets ON tickets.tickets_id = clientes.id_tickets
INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores
";

if(!isset($_SESSION['cliente'])) {

    $lista_clientes = mysqli_query($conexion, $tablaClientes);
}

// session_start();

// Busca al cliente y muestra solo los datos de ese cliente

// MÉTODO PARA INSTERTAR REGISTROS (AÑADIR USUARIO NUEVO, CON PERMISOS DE CLIENTE)

if (isset($_POST["ingresarCliente"])) {

    $registroClientes = "INSERT INTO clientes (nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2, contacto2)"
        . "VALUES('" . $nombreCliente . "','" . $contacto . "','" . $telefono . "','" . $correo . "','" . $razonSocial . "','" . $direccion . "','" . $telefono2 . "','" . $correo2 . "','" . $contacto2 . "')";

    $UsuarioPlataforma = "INSERT INTO rolesdeusuario (username, contrasena)" . "VALUES('" . $username . "', '" . $contrasena . "')";

    if (mysqli_query($conexion, $registroClientes) && mysqli_query($conexion, $UsuarioPlataforma)) {

        echo "<script> alert ('Cliente registrado con éxito');
        window.location='../paginas/clientes.php'</script>";
    } else {
        echo "<script> alert ('Error de registro');
        window.location='../paginas/clientes.php'</script>";
    }
    $AsignaID = "UPDATE rolesdeusuario SET rol=2 WHERE rol=0";

    $sql_query = mysqli_query($conexion, $AsignaID);
}

//MÉTODO PARA EDITAR UN REGISTRO EXISTENTE

if (isset($_POST["editarCliente"])) {

    $editarCliente = "UPDATE clientes SET nombreCliente='$nombreCliente', contacto='$contacto', razonSocial='$razonSocial', correo='$correo', telefono='$telefono', direccion='$direccion', correo2='$correo2', telefono2='$telefono2', contacto2='$contacto2' WHERE id_cli='$id_cli'";

    if (mysqli_query($conexion, $editarCliente)) {

        echo "<script> alert ('Datos del Cliente actualizados con éxito');
        window.location='../paginas/clientes.php'</script>";
    } else {
        echo "<script> alert ('Error de actualización');
        window.location='../paginas/clientes.php'</script>";
    }
}




?>
