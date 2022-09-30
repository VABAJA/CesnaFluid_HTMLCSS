<!-- ELIMINA DISPOSITIVO -->
<?php
session_start();

//variable de conexión
$conexion = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conexion)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}

// $id_cli = $_POST['id_cli'];
// $usuario = $_POST['usuario'];
// BORRA UN REGISTRO DE LA TABLA
/* $id_cli = $_GET['id_cli'];

$elimina_registro = "DELETE FROM clientes
    -- INNER JOIN usuarios ON usuarios.usuarios_id = clientes.id_usuarios
    -- INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
    -- INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
    -- INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores
    -- INNER JOIN configuracion ON configuracion.configuracion_id = clientes.id_configuracion
    WHERE clientes.id_cli = '$id_cli'";

$elimina = mysqli_query($conexion, $elimina_registro);

if (mysqli_query($conexion, $elimina)) {
    $elimina_props = "DELETE FROM usuarios, dispositivos, vehiculos, contenedores, configuracion
    INNER JOIN usuarios ON usuarios.usuarios_id = clientes.id_usuarios
    INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
    INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
    INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores
    INNER JOIN configuracion ON configuracion.configuracion_id = clientes.id_configuracion
    WHERE clientes.id_cli = '$id_cli'";
}
if ((mysqli_query($conexion, $elimina)) & (mysqli_query($conexion, $elimina_props))) {

    echo "<script> alert ('Cliente eliminado con éxito');
    window.location='../paginas/clientes.php'</script>";
} else {
    echo "Error";
    echo "<script> alert ('Error de registro');
        window.location='../paginas/clientes.php'</script>";
} */
/* $elimina_usuario = "DELETE FROM usuarios WHERE usuarios_id = $id_cli AND usuario = $usuario";

if (isset($_POST['borraUsuario'])){
    
    $borraUsuario = mysqli_query($conexion, $elimina_usuario);

} */

// if ($_SERVER['REQUEST_METOD'] === 'POST') {
// BORRA CLIENTE  
$id_cli = $_POST['id_cli'];
$id_cli = filter_var($id_cli, FILTER_VALIDATE_INT);

if ($id_cli) {
    $elimina_cliente = "DELETE clientes FROM clientes 
    INNER JOIN usuarios ON usuarios.usuarios_id = clientes.id_usuarios
    INNER JOIN dispositivos ON dispositivos.dispositivos_id = clientes.id_dispositivos
    INNER JOIN vehiculos ON vehiculos.vehiculos_id = clientes.id_vehiculos
    INNER JOIN contenedores ON contenedores.contenedores_id = clientes.id_contenedores
    INNER JOIN tickets ON tickets.tickets_id = clientes.id_tickets
    INNER JOIN configuracion ON configuracion.configuracion_id = clientes.id_configuracion
    AND usuarios.usuarios_id = ${id_cli}";

    $borraCliente = mysqli_query($conexion, $elimina_cliente);

    if ($borraCliente) {

        echo "<script> alert ('Cliente eliminado con éxito');
                window.location='../paginas/clientes.php'</script>";
    }
}


// BORRA USUARIO 
$usuarios_id = $_POST['usuarios_id'];
$usuarios_id = filter_var($usuarios_id, FILTER_VALIDATE_INT);

if ($usuarios_id) {
    $elimina_usuario = "DELETE FROM usuarios WHERE usuarios_id = ${usuarios_id}";
    $borraUsuario = mysqli_query($conexion, $elimina_usuario);

    if ($borraUsuario) {

        echo "<script> alert ('Usuario eliminado con éxito');
            window.location='../paginas/usuarios.php'</script>";
    }
}

?>