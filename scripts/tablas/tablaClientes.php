<!-- TABLA DE CLIENTES EN CLIENTES  -->
<?php
session_start();
//variable de conexión
$conectar = mysqli_connect('localhost', 'root', '123456', 'tramex1');

//verificación de conexión

if (mysqli_connect_errno($conectar)) {
    echo "Conexión Fallida" . mysqli_connect_error();
} else {
    // Busca al cliente y muestra solo los datos de ese cliente
    if($_SESSION['cliente']) { 

               
            $first = "SELECT id FROM clientes WHERE nombreCliente LIKE '%" . $_SESSION['cliente'] . "%'";
        
            $second = mysqli_query($conectar, $first);
        
            $third = mysqli_fetch_array($second);
        
            $ide = $third['id'];
        
            //die(print_r($ide));
            $resultadoCliente = mysqli_query($conectar, "SELECT usuario, nombreDispositivo, vehiculo, registroTicket, nombreContenedor
                                                        FROM usuarios, dispositivos, vehiculos, tickets, contenedores
                                                        WHERE usuarios_id = '$ide'");
        }
    } 

?>

