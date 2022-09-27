<!-- ELIMINA DISPOSITIVO -->
<?php
session_start();

//variable de conexión
$conexion = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conexion)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}

// BORRA UN REGISTRO DE LA TABLA
$id_cli = $_GET['id_cli'];
// $id_cli = $_POST['id_cli'];

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
}
?>