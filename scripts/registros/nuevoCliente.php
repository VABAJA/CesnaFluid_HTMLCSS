<!-- REGISTRO DE CLIENTE NUEVO  -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreCliente = $_POST['nombreCliente'];
$contacto = $_POST['contacto'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$razonSocial = $_POST['razonSocial'];
$direccion = $_POST['direccion'];
$telefono2 = $_POST['telefono2'];
$correo2 = $_POST['correo2'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
// echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
// or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarCliente"])) {

    $registroClientes = "INSERT INTO clientes (nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2)"
        . "VALUES('" . $nombreCliente . "','" . $contacto . "','" . $telefono . "','" . $correo . "','" . $razonSocial . "','" . $direccion . "','" . $telefono2 . "','" . $correo2 . "')";

/*     

$buscar = $_POST['buscar'];
$_SESSION['cliente'] = $_POST['buscar'];
if (isset($_SESSION['cliente'])) {

$AsignaID = "UPDATE clientes SET id_usuarios=id, id_dispositivos=id, id_vehiculos=id, id_contenedores=id, id_configuracion=id WHERE id=0";

    $sql_query = mysqli_query($conexion, $AsignaID); 
    
}*/

    if (mysqli_query($conexion, $registroClientes)) {

        echo "<script> alert ('Cliente registrado con éxito');
            window.location='../../paginas/clientes.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
            window.location='../../paginas/clientes.php'</script>";
    }
    $AsignaID = "UPDATE clientes SET id_usuarios=id, id_dispositivos=id, id_vehiculos=id, id_contenedores=id, id_configuracion=id WHERE id_usuarios=0";

    $sql_query = mysqli_query($conexion, $AsignaID);
}

?>