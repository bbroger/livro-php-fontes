<?php

   try{
   $pdo=new PDO('mysql:host=localhost;dbname=testes', 'root', 'root');

}catch(PDOException $e){
	exit('Error could not connect');
}




?>
