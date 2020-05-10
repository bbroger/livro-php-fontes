<?php
session_start();
$_SESSION['login'] = $_POST['login'];  // Armazenar o login no Session apenas
					// neste script, nos demais basta testar
					// se o Session está setado
if (isset($_SESSION['login'])){

	require("includes/funcoes_db.inc.php");
	$login = $_SESSION['login'];
	$senha = md5($_POST['senha']);

	$connect=db_connect("127.0.0.1","root","","3306","condominio");
	$str = "SELECT * FROM usuario WHERE login='$login' and senha='$senha'";
	$result = db_query($connect,$str);

	$registros = db_numrows($result);
	if ($registros <= 0) {
    	?>	<script>alert ('Este login ou senha não estão cadastrados.\nRegistre-se se novo usuário!');
      			location='index.php';
      		</script>
	<?php
	}else{
		?><script>location='menu.php';</script><?php
	}
}else{
	?><script>alert('Acesso ilegal');location='index.php';</script><?php
}
?>
