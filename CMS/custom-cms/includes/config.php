<?php

$servername = "localhost";
$database = "testes";
$username = "root";
$password = "root";
 
try {
   $pdo = new PDO("mysql:host=$servername;dbname=$database", $username , $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
   exit("Connection with DB failed.");
}

?>
