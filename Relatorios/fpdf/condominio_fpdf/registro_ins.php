<?php

	require("includes/funcoes_db.inc.php");
	$connect=db_connect("127.0.0.1","root","","3306","condominio");

	$login = $_POST['login'];
	$str = "SELECT * FROM usuario WHERE login='$login'";
	$result=db_query($connect, $str);

	if (mysql_num_rows($result)>0) {
    	?>	<script>alert ('Este login já está cadastrado. Favor escolher outro!');
      		location='registro.php';
      	</script>
	    <?php
	}else{
		$senha = md5($_POST['senha']);
		$nome= $_POST['nome'];
		$email= $_POST['email'];

		$table="usuario";
		$fields="login, senha, nome, email"; 
		$values="'$login', '$senha', '$nome', '$email'";
		
		db_insertreg($connect, $table, $fields, $values);
	}
    		?><script>location='index.php';</script><?php

?>
