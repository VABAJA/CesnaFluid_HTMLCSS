<?php
session_start();
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
?>
<?php 
session_start();
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

$conf_Device="UPDATE configuracion SET usuario = 0 WHERE usuario = 1";

if (mysqli_query($conectar, $conf_Device)) {
    echo "<script> alert ('Configuración actualizada con éxito');window.location='../paginas/dispositivos.php'</script>";
    } else {
    echo "Error";
    }
    echo "<script> alert ('Ocurrió un error');window.location='../paginas/dispositivos.php'</script>";


?>