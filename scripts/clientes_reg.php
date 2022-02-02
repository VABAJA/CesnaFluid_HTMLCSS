<?php


$host_sql="localhost";
            $user_sql="root";
            $pass_sql="123456";
            $db_sql="tramex1";




$usuario=$_POST['usuario'];
$nomusuario=$_POST['nomusuario'];
$nomempresa=$_POST['nomempresa'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$locacion=$_POST['locacion'];
$vehiculo=$_POST['vehiculo'];
$litros=$_POST['litros'];
$ticket=$_POST['ticket'];
$km=$_POST['km'];



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
   
    $registroClientes="INSERT INTO registro (usuario, nomusuario, nomempresa, direccion, email, telefono, locacion, vehiculo, litros, ticket, km)"
    ."VALUES('".$usuario."','".$nomusuario."','".$nomempresa."','".$direccion."','".$email."','".$telefono."','".$locacion."','".$vehiculo."','".$litros."','".$ticket."','".$km."')";  
    
    
    if (mysqli_query($conexion, $registroClientes)) {
        echo "<script> alert ('Cliente registrado con éxito');window.location='../paginas/clientes.php'</script>";
        } else {
        echo "Error";
        }
        echo "<script> alert ('Error de registro');window.location='../paginas/clientes.php'</script>";

}


//$querty=mysqli_query($conexion,$querty);
