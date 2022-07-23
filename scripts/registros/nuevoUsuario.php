
<!-- REGISTRO DE USUARIO NUEVO -->

<?php
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$nombreCliente = $_POST['nombreCliente'];
$usuario = $_POST['usuario'];
$usuariopin = $_POST['usuariopin'];
$nomusuario = $_POST['nomusuario'];
$correoUsuario = $_POST['correoUsuario'];
$fechareg = $_POST['fechareg'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
//or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

if (isset($_POST["ingresarUsuario"])) {

    $registroUsuarios = "INSERT INTO usuarios (nombreCliente, usuario, usuariopin, nomusuario, correoUsuario, fechareg)"
        . "VALUES('" . $nombreCliente . "','" . $usuario . "','" . $usuariopin . "', '" . $nomusuario . "','" . $correoUsuario . "','" . $fechareg . "')";

    if (mysqli_query($conexion, $registroUsuarios)) {
        echo "<script> alert ('Usuario registrado con éxito');
        window.location='../../paginas/usuarios.php'</script>";
    } else {
        echo "Error";
        echo "<script> alert ('Error de registro');
        window.location='../../paginas/usuarios.php'</script>";
    }
   /*  $AsignaID = "UPDATE usuarios SET usuarios.usuarios_id = clientes.id_usuarios INNER JOIN clientes WHERE usuarios.usuarios_id=0";

    $sql_query = mysqli_query($conexion, $AsignaID); */
}

//$querty=mysqli_query($conexion,$querty);

?>

