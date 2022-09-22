<?php
//CONEXIÓN A BASE DE DATOS Y DECLARACIÓN DE VARIABLES

$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$id_cli = $_POST['id_cli'];

$nombreCliente = $_POST['nombreCliente'];
$usuario = $_POST['usuario'];
$usuariopin = $_POST['usuariopin'];
$nomContacto = $_POST['nomContacto'];
$correoContacto = $_POST['correoContacto'];
$fechareg = $_POST['fechareg'];
$usuarios_id = $_POST['usuarios_id'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

// TABLA DE REGISTROS 

$tablaUsuarios = "SELECT * FROM usuarios";

$usuarioDefinido = "SELECT * FROM usuarios
INNER JOIN clientes ON usuarios.usuarios_id=clientes.id_usuarios
AND clientes.nombreCliente
LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_usuarios = mysqli_query($conexion, $tablaUsuarios);
    
} else {
    $lista_usuarios = mysqli_query($conexion, $usuarioDefinido);

/*     //die(print_r($ide));
    $resultado_usuarios = mysqli_query($conectar, "SELECT usuario, usuariopin, nomContacto, correoContacto, fechareg, usuarios_id FROM usuarios WHERE usuarios_id = '$ide'"); */

}


// NUEVO REGISTRO 

if (isset($_POST["ingresarUsuario"])) {

    $registroUsuarios = "INSERT INTO usuarios (nombreCliente, usuario, usuariopin, nomContacto, correoContacto, fechareg, usuarios_id)"
        . "VALUES('" . $nombreCliente . "','" . $usuario . "','" . $usuariopin . "', '" . $nomContacto . "','" . $correoContacto . "','" . $fechareg . "','" . $usuarios_id . "')";

    if (mysqli_query($conexion, $registroUsuarios)) {
        echo "<script> alert ('Usuario registrado con éxito');
        window.location='../paginas/usuarios.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../paginas/usuarios.php'</script>";
    }
    $AsignaID = "UPDATE usuarios SET usuarios_id='$id_cli' WHERE usuarios_id=0";

    $sql_query = mysqli_query($conexion, $AsignaID);

}


?>