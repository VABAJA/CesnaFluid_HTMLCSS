<!-- ELIMINA DISPOSITIVO -->
<?php
session_start();

//variable de conexión
$conexion = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conexion)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}

$id_cli = $_GET['id_cli'];
// // BORRA UN CLIENTE DE LA TABLA
// $borraCliente = "DELETE FROM clientes WHERE clientes.id_cli = '$id_cli'";

// if (isset($id_cli)){

//     // $elimina_cliente = mysqli_query($conexion, $borraCliente);
//     echo "<script> alert ('Cliente eliminado con éxito');
//     window.location='../paginas/clientes.php'</script>";
// }
// if($_POST['$id_cli'])($conexion, $elimina_cliente)); 

    

// BORRA UN USUARIO DE LA TABLA

$borraUsuario = "DELETE FROM usuarios WHERE usuarios_id = '$id_cli'";
$elimina_usuario = mysqli_query($conexion, $borraUsuario);



if ($conexion->query($elimina_cliente) === TRUE) {
    echo "<script> alert ('Usuario eliminado con éxito');
    window.location='../paginas/usuarios.php'</script>";
  } else {
    echo "<script> alert ('Error borrando al Usuario');
    window.location='../paginas/usuarios.php'</script>";

    echo "Error deleting record: " . $conexion->error;
  }
  
  $conexion->close();



// if(mysqli_query($conexion, $elimina_cliente)); {

//     $elimina_usuario = mysqli_query($conexion, $borraUsuario);
    
//     echo "<script> alert ('Usuario eliminado con éxito');
//     window.location='../paginas/usuarios.php'</script>";
// }

?>