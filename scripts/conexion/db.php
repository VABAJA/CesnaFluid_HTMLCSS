<?php
//CONEXIÓN A BASE DE DATOS
$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

function conectarBD(): mysqli
{
    $db = mysqli_connect($host_sql, $user_sql, $pass_sql);
    if (mysqli_connect_errno($db)) {
        //echo "Fallo en la conexión";
        exit();
    }
    
    mysqli_select_db($conexion, $db_sql);
    //or die ("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

}
?>
