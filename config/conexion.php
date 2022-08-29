<?php

$host_sql = "localhost";
$user_sql = "root";
$pass_sql = "123456";
$db_sql = "tramex1";

$conn = mysqli_connect($host_sql, $user_sql, $pass_sql);
if (mysqli_connect_errno()) {
    // echo "Fallo en la conexión";
    exit();
}

mysqli_select_db($conn, $db_sql);
// or die ("No se encuentra la base de datos");
mysqli_set_charset($conn, "utf8");


?>