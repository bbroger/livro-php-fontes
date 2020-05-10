<?php

session_start();
if (isset($_SESSION['login'])){

	require_once("includes/template.inc.php");
	require_once("includes/funcoes_div.inc.php");
	
	echo fundo("blanchedalmond","","");

	echo "<link href=\"http://127.0.0.1/curso_php/modelo/includes/images/favicon.png\" 
		 type=\"image/gif\" rel= \"icon\">";

	echo cabecalho("Condomínio Ferreira", "Menu do Aplicativo");
	echo menu();
	echo linhas_br(5);
	echo rodape("Julho de 2006");
	echo "<br><br><center>"; include ("includes/cont.php"); echo "</center><br>";

}else{
	?><script>alert('Acesso ilegal');location='index.php';</script><?php
}
?>
