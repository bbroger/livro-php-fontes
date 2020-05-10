<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");
require_once("includes/funcoes_div.inc.php");

$connect=db_connect("127.0.0.1","root","","3306","condominio");

echo fundo("blanchedalmond","frmCon","vencimento");
echo cabecalho("Condomínio Ferreira", "Consultar Recibos");
echo menu();
?>

<form name="frmCon" action="consultar_con.php" method="POST">
<table border=0 align="center">

<tr><td><select name=nome>
<?php $query = "select nome,nome from recibos order by nome";
combo($connect, $nome, $query, $blank="Todos"); ?>
</select></td></tr>

<tr><td><?=espacos_br(6) ?><input type="submit" name="enviar" value="Consultar"></td></tr>
</table></form>
<pre>





</pre>
<?php
echo rodape("Julho de 2006");

// Caso a variável de Session não esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
