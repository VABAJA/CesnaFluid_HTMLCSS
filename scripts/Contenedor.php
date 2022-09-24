<!-- REGISTRO DE CONTENEDOR NUEVO -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreContenedor = $_POST['nombreContenedor'];
$contenedorUbicacion = $_POST['contenedorUbicacion'];
$volumen = $_POST['volumen'];
$vacum = $_POST['vacum'];
$contenedores_id = $_POST['contenedores_id'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

// TABLA DE CONTENEDORES

$tablaContenedor = "SELECT * FROM clientes
INNER JOIN contenedores
ON contenedores.contenedores_id=clientes.id_contenedores";

$contenedorDefinido = "SELECT * FROM clientes
INNER JOIN contenedores ON contenedores.contenedores_id=clientes.id_contenedores
AND clientes.nombreCliente
LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_contenedores = mysqli_query($conexion, $tablaContenedor);
    
} else {
    $lista_contenedores = mysqli_query($conexion, $contenedorDefinido);

/*     //die(print_r($ide));
    $resultado_usuarios = mysqli_query($conectar, "SELECT usuario, usuariopin, nomContacto, correoContacto, fechareg, usuarios_id FROM usuarios WHERE usuarios_id = '$ide'"); */

}

// NUEVO REGISTRO DISPOSITIVOS 
if (isset($_POST["ingresarContenedor"])) {

    $registroContenedores = "INSERT INTO contenedores (nombreContenedor, contenedorUbicacion, vacum, volumen, contenedores_id)"
        . "VALUES('" . $nombreContenedor . "','" . $contenedorUbicacion . "','" . $vacum . "','" . $volumen . "','" . $contenedores_id . "')";

    if (mysqli_query($conexion, $registroContenedores)) {
        echo "<script> alert ('Dispositivo registrado con éxito');
        window.location='../paginas/dispositivos.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../paginas/dispositivos.php'</script>";
    }
}

$AsignaID = "UPDATE contenedores SET contenedores_id='$id_cli' WHERE contenedores_id=0";

    $sql_query = mysqli_query($conexion, $AsignaID);

?>