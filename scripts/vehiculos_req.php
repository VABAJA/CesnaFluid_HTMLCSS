<?php


$host_sql="localhost";
            $user_sql="root";
            $pass_sql="123456";
            $db_sql="tramex1";




$usuario=$_POST['vehiculo'];
$usuariopin=$_POST['vehiculopin'];
$locacion=$_POST['locacion'];







$conexion=mysqli_connect($host_sql,$user_sql,$pass_sql);
if(mysqli_connect_errno()){
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion,$db_sql);
        //or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion,"utf8");


if(isset($_POST["ingresarVehiculo"]))
{
   
    $registroVehiculos="INSERT INTO vehiculos (vehiculo, vehiculopin, locacion)"
    ."VALUES('".$vehiculo."','".$vehiculopin."', '".$locacion."')";  
    
    
    if (mysqli_query($conexion, $registroVehiculos)) {
        echo "<script> alert ('Vehículo registrado');window.location='../html/vehiculos.html'</script>";
        } else {
        echo "Error";
        }
        echo "<script> alert ('Error de registro');window.location='../html/vehiculos.html'</script>";

}


//$querty=mysqli_query($conexion,$querty);
