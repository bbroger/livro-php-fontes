<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");
require_once("includes/funcoes_div.inc.php");

$connect=db_connect("127.0.0.1","root","","3306","condominio");


echo fundo("blanchedalmond","frmExc","nome");
echo cabecalho("Condomínio Ferreira", "Excluir Recibos");
echo menu();
?>

<form name="frmExc" action="excluir.php" method="POST" onSubmit="if(nome.value=='0'){alert('Favor selecionar um Nome');return false;}">
<table border=0 align="center">

<tr><td><select name=nome>
<?php $query = "select nome,nome from recibos order by nome";
combo($connect, $nome, $query, $blank="Selecione"); ?>
</select></td></tr>

	<tr><td><?=espacos_br(6) ?><input type="submit" name="enviar_exc" value="Excluir" onClick="var c;c=confirm('Realmente excluir o Recibo selecionado?');if(!c)return false;"></td></tr>
	</table></form>
	<pre>





	</pre>
	<?php

	if (isset($_POST['enviar_exc'])){
		$nome=$_POST['nome'];

	    $table="recibos";
	    $where=" where nome='$nome'";
	    db_deletereg($connect, $table, $where);
	}

	echo rodape("Julho de 2006");

// Caso a variável de Session não esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
