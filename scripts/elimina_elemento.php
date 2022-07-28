<!-- ELIMINA DISPOSITIVO -->
<?php
session_start();

//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión
if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
}

if (isset($_SESSION['cliente'])) {

    if (isset($_POST['borraDispositivo'])) {
        
        $first = "SELECT id_dispositivos FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

        $second = mysqli_query($conectar, $first);

        $third = mysqli_fetch_array($second);

        $ide = $third['id_dispositivos'];

        //die(print_r($ide));
        $borraDispositivo = mysqli_query($conectar, "DELETE FROM dispositivos WHERE dispositivos_id = '$ide'");
    }
}
?>