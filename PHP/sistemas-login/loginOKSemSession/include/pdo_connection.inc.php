<?php 

$user='root';
$pass='mysql';
$dsn='mysql:host=localhost;dbname=login;charste=utf8';

try {
	$pdo= new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo "Error: ".$e->getMessage();
	
}






 ?>
