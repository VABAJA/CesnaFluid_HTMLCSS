<!-- REGISTRO DE DISPOSITIVO NUEVO  -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";


$nombreDispositivo = $_POST['nombreDispositivo'];
$pinRFID = $_POST['pinRFID'];
$ubicacion = $_POST['ubicacion'];
$vacum = $_POST['vacum'];
$dispositivos_id = $_POST['dispositivos_id'];

$id_cli = $_POST['id_cli'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

// TABLA DE DISPOSITIVOS 
if (isset($_SESSION['cliente'])) {

    // $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_dispositivos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_dispositivos'];

    //die(print_r($ide));
    $resultado_dispositivos = mysqli_query($conectar, "SELECT nombreDispositivo, pinRFID, ubicacion, vacum FROM dispositivos WHERE dispositivos_id = '$ide'");
}

// NUEVO REGISTRO DISPOSITIVOS 
if (isset($_POST["ingresarDispositivo"])) {

    $registroDispositivos = "INSERT INTO dispositivos (nombreDispositivo, pinRFID, ubicacion, vacum, dispositivos_id)"
        . "VALUES('" . $nombreDispositivo . "','" . $pinRFID . "','" . $ubicacion . "','" . $vacum . "','" . $dispositivos_id . "')";

    if (mysqli_query($conexion, $registroDispositivos)) {
        echo "<script> alert ('Dispositivo registrado con éxito');
        window.location='../paginas/dispositivos.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../paginas/dispositivos.php'</script>";
    }
}

$AsignaID = "UPDATE dispositivos SET dispositivos_id='$id_cli' WHERE rol=0";

    $sql_query = mysqli_query($conexion, $AsignaID);

?>