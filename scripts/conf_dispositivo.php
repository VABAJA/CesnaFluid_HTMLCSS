<?php
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

$resultado_config = mysqli_query($conectar, "SELECT * FROM configuracion");

// if (isset($_SESSION['cliente'])) {
//     if($_SESSION['cliente'] = $_POST['buscar']) { 

// $isValidAddress = 1;
// if($isValidAddress)
// {
//    echo 'true is represented as ';
//    echo ($isValidAddress);
// }
// else
// {
//    echo 'false is represented as ';
//    echo ($isValidAddress);
// }