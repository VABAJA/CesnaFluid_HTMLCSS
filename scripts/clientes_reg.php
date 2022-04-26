<?php


$host_sql="localhost";
            $user_sql="root";
            $pass_sql="123456";
            $db_sql="tramex1";




$nombreCliente=$_POST['nombreCliente'];
$clienteId=$_POST['clienteId'];
$contacto=$_POST['contacto'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$id_dispositivos=$_POST['id_dispositivos'];
$id_vehiculos=$_POST['id_vehiculos'];
$id_contenedores=$_POST['id_contenedores'];
$id_tickets=$_POST['id_tickets'];
$id_usuarios=$_POST['id_usuarios'];



$conexion=mysqli_connect($host_sql,$user_sql,$pass_sql);
if(mysqli_connect_errno()){
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion,$db_sql);
        //or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion,"utf8");


if(isset($_POST["ingresarCliente"]))
{
   
    $registroClientes="INSERT INTO registro (nombreCliente, clienteId, contacto, telefono, correo, id_dispositivos, id_vehiculos, id_contenedores, id_tickets, id_usuarios)"
    ."VALUES('".$nombreCliente."','".$clienteId."','".$contacto."','".$telefono."','".$correo."','".$id_dispositivos."','".$id_vehiculos."','".$id_contenedores."','".$id_tickets."','".$id_usuarios."')";  
    
    
    if (mysqli_query($conexion, $registroClientes)) {
        echo "<script> alert ('Cliente registrado con éxito');window.location='../paginas/clientes.php'</script>";
        } else {
        echo "Error";
        }
        echo "<script> alert ('Error de registro');window.location='../paginas/clientes.php'</script>";

}


//$querty=mysqli_query($conexion,$querty);
