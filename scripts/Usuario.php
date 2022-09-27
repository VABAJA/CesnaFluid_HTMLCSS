<?php
//CONEXIÓN A BASE DE DATOS Y DECLARACIÓN DE VARIABLES

$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$id_cli = $_POST['id_cli'];

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

$tablaUsuarios = "SELECT * FROM clientes
INNER JOIN usuarios
ON usuarios.usuarios_id=clientes.id_usuarios";

$usuarioDefinido = "SELECT * FROM clientes
INNER JOIN usuarios ON usuarios.usuarios_id=clientes.id_usuarios
AND clientes.nombreCliente
LIKE '%" . $_SESSION['cliente'] . "%'";

if (!isset($_SESSION['cliente'])) {

    $lista_usuarios = mysqli_query($conexion, $tablaUsuarios);
    
} else {
    $lista_usuarios = mysqli_query($conexion, $usuarioDefinido);


}


// NUEVO REGISTRO 

if (isset($_POST["ingresarUsuario"])) {

    $registroUsuarios = "INSERT INTO usuarios (usuario, usuariopin, nomContacto, correoContacto, fechareg, usuarios_id)"
        . "VALUES('" . $usuario . "','" . $usuariopin . "', '" . $nomContacto . "','" . $correoContacto . "','" . $fechareg . "','" . $usuarios_id . "')";

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

//MÉTODO PARA EDITAR UN USUARIO EXISTENTE
if (isset($_POST["editarUsuario"])) {

    $editar_usuario = "UPDATE usuarios SET usuario='$usuario', usuariopin='$usuariopin', nomContacto='$nomContacto', correoContacto='$correoContacto', fechareg='$fechareg' WHERE id_cli='$id_cli'";

    if (mysqli_query($conexion, $editar_usuario)) {

        echo "<script> alert ('Datos del Usuario actualizados con éxito');
        window.location='../paginas/usuarios.php'</script>";
    } else {
        echo "<script> alert ('Error de actualización');
        window.location='../paginas/usuarios.php'</script>";
    }
}

?>