<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");
require_once("includes/funcoes_div.inc.php");

$connect=db_connect("127.0.0.1","root","","3306","condominio");

echo fundo("blanchedalmond","frmCon","apartamento");
echo cabecalho("Condomínio Ferreira", "Atualizar Recibos");
echo menu();
?>

<form name="frmAtu" action="atualizar_atu.php" method="POST" onSubmit="if(apartamento.value=='0'){alert('Favor selecionar um Apartamento');return false;}">
<table border=0 align="center">

<tr><td><select name=apartamento>
<?php $query = "select apartamento,apartamento from recibos order by apartamento";
combo($connect, $apartamento, $query, $blank="Selecionar"); ?>
</select></td></tr>

<tr><td><?=espacos_br(6)?><input type="submit" name="enviar" value="Atualizar"></td></tr>
</table></form>
<pre>





</pre>
<?php
echo fontes("atualizarfontes.php");
echo rodape("Julho de 2006");

// Caso a variável de Session não esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
