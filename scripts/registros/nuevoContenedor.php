
<!-- REGISTRO DE USUARIO NUEVO -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreCliente = $_POST['nombreCliente'];
$contenedor_id = $_POST['contenedor_id'];
$contenedorUbicacion = $_POST['contenedorUbicacion'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarContenedor"])) {

    $registroContenedor= "INSERT INTO contenedores (nombreCliente, contenedor_id, contenedorUbicacion)"
        . "VALUES('" . $nombreCliente . "','" . $contenedor_id . "','" . $contenedorUbicacion . "')";

    if (mysqli_query($conexion, $registroContenedor)) {
        echo "<script> alert ('Contenedor registrado con éxito');
        window.location='../../paginas/contenedores.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../../paginas/contenedores.php'</script>";
    }
    $AsignarVarContenedor = "UPDATE clientes SET id_contenedores=id WHERE id_contenedores=0";
    $sql_query = mysqli_query($conexion,$AsignarVarContenedor);
}

//$querty=mysqli_query($conexion,$querty);

?>
