<?php


$host_sql="localhost";
            $user_sql="root";
            $pass_sql="123456";
            $db_sql="tramex1";




$usuario=$_POST['usuario'];
$usuariopin=$_POST['usuariopin'];
$nomusuario=$_POST['nomusuario'];
$locacion=$_POST['locacion'];


$conexion=mysqli_connect($host_sql,$user_sql,$pass_sql);
if(mysqli_connect_errno()){
    //echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conexion,$db_sql);
        //or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion,"utf8");


if(isset($_POST["ingresarUsuario"]))
{
   
    $registroUsuarios="INSERT INTO usuarios (usuario, usuariopin, nomusuario, locacion)"
    ."VALUES('".$usuario."','".$usuariopin."', '".$nomusuario."','".$locacion."')";  
    
    
    if (mysqli_query($conexion, $registroUsuarios)) {
        echo "<script> alert ('Usuario registrado');window.location='../html/usuarios.html'</script>";
        } else {
        echo "Error";
        }
        echo "<script> alert ('Error de registro');window.location='../html/usuarios.html'</script>";

}


//$querty=mysqli_query($conexion,$querty);





?>