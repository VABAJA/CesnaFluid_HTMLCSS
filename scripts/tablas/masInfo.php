<!-- DESPLIEGA MÁS INFORMACIÓN EN CLIENTES -->
<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión

if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
} else {
    // Busca al cliente y muestra solo los datos de ese cliente
    if (isset($_SESSION['cliente'])) {

        $resultado_info = mysqli_query($conectar, "SELECT id, nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2 FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'");
    } else {

        // echo "No hay sesión";

    }
}

?>