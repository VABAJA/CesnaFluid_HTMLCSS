<?php
//Incluímos inicialmente la conexión a la base de datos

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

$username = $_POST['username'];
$contrasena = $_POST['contrasena'];

$conexion = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    // echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion, $db_sql);
// or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");

//Implementamos un método para insertar registros

if (isset($_POST["ingresarCliente"])) {

    $registroClientes = "INSERT INTO clientes (nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2)"
        . "VALUES('" . $nombreCliente . "','" . $contacto . "','" . $telefono . "','" . $correo . "','" . $razonSocial . "','" . $direccion . "','" . $telefono2 . "','" . $correo2 . "')";

    $registroUsuarioPlataforma = "INSERT INTO rolesdeusuario (username, contrasena)" . "VALUES ('" . $username . "', '" . $contrasena . "')";

    if (mysqli_query($conexion, $registroClientes) && mysqli_query($conexion, $registroUsuarioPlataforma)) {

        echo "<script> alert ('Cliente registrado con éxito');
            window.location='../paginas/clientes.php'</script>";
    } else {
        echo "<script> alert ('Error de registro');
            window.location='../paginas/clientes.php'</script>";
    }
    $AsignaID = "UPDATE rolesdeusuario SET rol=2 WHERE rol=0";

    $sql_query = mysqli_query($conexion, $AsignaID);
}
?>
//Implementamos un método para editar registros
//     public function editar($idcategoria,$nombre,$descripcion)
//     {
//         $sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
//         return ejecutarConsulta($sql);
//     }

//     //Implementamos un método para desactivar categorías
//     public function desactivar($idcategoria)
//     {
//         $sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
//         return ejecutarConsulta($sql);
//     }

//     //Implementamos un método para activar categorías
//     public function activar($idcategoria)
//     {
//         $sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
//         return ejecutarConsulta($sql);
//     }

//     //Implementar un método para mostrar los datos de un registro a modificar
//     public function mostrar($idcategoria)
//     {
//         $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
//         return ejecutarConsultaSimpleFila($sql);
//     }

//     //Implementar un método para listar los registros
//     public function listar()
//     {
//         $sql="SELECT * FROM categoria";
//         return ejecutarConsulta($sql);
//     }
// }
