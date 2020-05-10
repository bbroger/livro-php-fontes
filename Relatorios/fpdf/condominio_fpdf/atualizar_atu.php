<?php
session_start();
if (isset($_SESSION['login'])){

	require_once("includes/template.inc.php");
	require_once("includes/funcoes_db.inc.php");
	require_once("includes/funcoes_div.inc.php");

	$connect=db_connect("127.0.0.1","root","","3306","condominio");

	$apartamento = $_POST['apartamento'];
	$strCons = "SELECT * FROM recibos WHERE apartamento = '$apartamento'";

	$cons = mysql_query($strCons,$connect);
	$campo = mysql_fetch_array($cons);

	$codigo= $campo['codigo'];	
	$nome= $campo['nome'];
	$vencimento= $campo['vencimento'];
	$agua_total= $campo['agua_total'];
	$pessoas_total = $campo['pessoas_total'];
	$apartamento = $campo['apartamento'];
	$pessoas = $campo['pessoas'];
	$cota_agua = $campo['cota_agua'];
	$cota_condominio = $campo['cota_condominio'];
	$cota_reserva= $campo['cota_reserva'];

	echo fundo("blanchedalmond","frmCon","apartamento");
	echo cabecalho("Condomínio Ferreira", "Atualização de Recibos");
	echo menu();
?>
<script>
function Enviar(nomedoform, novoaction)
{
	document.forms[nomedoform].action = novoaction;
	document.forms[nomedoform].submit();
}	

</script>

	<table align=center>
	<form name=frmAtu method=post action=atualizar_atu.php>
	<tr><td>Código</td><td bgcolor=white> <?= $codigo ?></td></tr>
	<tr><td>Nome</td><td><input name=nome value='<?= $nome ?>'></td></tr>
	<tr><td>Vencimento</td><td><input name=vencimento value='<?= $vencimento?>'></td></tr>
	<tr><td>Total da Água</td><td><input name=agua_total value='<?= $agua_total?>'></td></tr>
	<tr><td>Total de Pessoas</td><td><input name=pessoas_total value='<?= $pessoas_total?>'></td></tr>
	<tr><td>Apartamento</td><td><input name=apartamento value='<?= $apartamento?>'></td></tr>
	<tr><td>Pessoas</td><td><input name=pessoas value='<?= $pessoas?>' ></td></tr>
	<tr><td>Cota da Água</td><td><input name=cota_agua value='<?= $cota_agua?>'></td></tr>
	<tr><td>Cota do Condomínio</td><td><input name=cota_condominio value='<?= $cota_condominio?>'></td></tr>
	<tr><td>Cota de Reserva</td><td><input name=cota_reserva value='<?= $cota_reserva?>'></td></tr>
<!--<tr><td></td><td><input name="btn_enviar" type="image" src="includes/images/enviar.png" TITLE="Clique para Atualizar" onClick="Enviar('frmAtu','atualizar_atu.php')"></td></tr>-->
	<tr><td></td><td><input name="btn_enviar" type="submit" value="Atualizar"></td></tr>
	</form></table>

<!-- Observar a necessidade de delimitadores '' nos campos não numéricos -->

<?php
	echo linhas_br(3);

	$btn_enviar=$_POST['btn_enviar'];
	if (isset($btn_enviar)){

		$nome= $_POST['nome'];
		$vencimento= $_POST['vencimento'];
		$agua_total= $_POST['agua_total'];
		$pessoas_total= $_POST['pessoas_total'];
		$apartamento= $_POST['apartamento'];
		$pessoas= $_POST['pessoas'];
		$cota_agua= $_POST['cota_agua'];
		$cota_condominio= $_POST['cota_condominio'];
		$cota_reserva= $_POST['cota_reserva'];

		$table="recibos";
		$fieldsvalues= "nome='$nome', vencimento='$vencimento', agua_total=$agua_total,
		pessoas_total=$pessoas_total, apartamento='$apartamento', pessoas=$pessoas,
		cota_agua=$cota_agua,cota_condominio=$cota_condominio, cota_reserva=$cota_reserva";
		$where = "WHERE apartamento='$apartamento'";

		db_updatereg($connect, $table, $fieldsvalues, $where);
		//$ret=mysql_query("update $table set $fieldsvalues $where", $connect);
		//if(!ret) echo "Erro na atualização";
		
		?><script>location="atualizar.php"</script><?php
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
