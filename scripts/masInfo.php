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

        $resultado_info = mysqli_query($conectar, "SELECT * FROM clientes 
        
        INNER JOIN usuarios ON id_usuarios = usuarios_id
        
        WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'");
    } else {

        // echo "No hay sesión";

    }
}

// REGISTRO DE TICKETS 
if (isset($_SESSION['cliente'])) {

    $conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

    $first = "SELECT id_tickets FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";

    $second = mysqli_query($conectar, $first);

    $third = mysqli_fetch_array($second);

    $ide = $third['id_tickets'];

    //die(print_r($ide));
    $resultado_tickets = mysqli_query($conectar, "SELECT registroTicket, fechareg, id_tick FROM tickets WHERE tickets_id = '$ide'");
}

?>