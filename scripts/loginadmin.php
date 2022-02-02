<?php
  
  $conn = "";
     
  try {
    $host_sql="localhost";
    $user_sql="root";
    $pass_sql="123456";
    $db_sql="tramex1";



     
      $conn = new PDO(
          "mysql:host=$servername; dbname=tramex1",
          $username, $password
      );
        
     $conn->setAttribute(PDO::ATTR_ERRMODE,
                      PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
      echo "Error en la conexión: " . $e->getMessage();
  }
    
  ?>