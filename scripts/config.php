<?php
define('USER', 'root');
define('PASSWORD', '123456');
define('HOST', 'localhost');
define('DATABASE', 'tramex1');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>