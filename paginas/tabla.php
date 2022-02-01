<?php
//varaible de conexión
  $conectar=mysqli_connect('localhost', 'root', '123456', 'tramex1');

  //verificación de conexión
  if(mysqli_connect_errno ($conectar)) {
      echo "Conexión Fallida".mysqli_connect_error();
  }


  $resultado = mysqli_query($conectar, "SELECT * FROM usuarios");
?>
<table width="500" cellpadding="5" cellspacing="5" border="1">
    <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>



    </tr>

    
    
<?php while($fila = mysqli_fetch_array ($resultado)): ?>
    
    
    <tr>
        <td class="text-center"><?php echo $fila['usuario']; ?></td>
        <td class="text-center"><?php echo $fila['usuariopin']; ?></td>
        <td class="text-center"><?php echo $fila['nomusuario']; ?></td>
        <td class="text-center"><?php echo $fila['locacion']; ?></td>

    </tr>
    
    <?php endwhile; ?>
</table>