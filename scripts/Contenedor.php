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

if (isset($_SESSION['cliente'])) {

    $first = "SELECT id_contenedores FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_contenedores'];

    //die(print_r($ide));
    $resultado_contenedores = mysqli_query($conectar, "SELECT nombreContenedor, contenedores_id, contenedorUbicacion, vacum, volumen FROM contenedores WHERE contenedores_id = '$ide'");
}

// NUEVO REGISTRO DE CONTENEDOR

if (isset($_POST["ingresarContenedor"])) {

    $registroContenedor = "INSERT INTO contenedores (nombreContenedor, contenedorUbicacion, volumen, vacum, contenedores_id)"
        . "VALUES('" . $nombreContenedor . "','" . $contenedorUbicacion . "','" . $volumen . "','" . $vacum . "','" . $contenedores_id . "')";

    if (mysqli_query($conexion, $registroContenedor)) {
        echo "<script> alert ('Contenedor registrado con éxito');
        window.location='../paginas/contenedores.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../paginas/contenedores.php'</script>";
    }
}

$AsignaID = "UPDATE contenedores SET contenedores_id='$id_cli' WHERE rol=0";

$sql_query = mysqli_query($conexion, $AsignaID);

?>