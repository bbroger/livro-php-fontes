<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");

echo fundo("blanchedalmond","frmCon","nome");
echo cabecalho("Condom�nio Ferreira", "Consultar Um Cond�mino");
echo menu();

	$connect=db_connect("127.0.0.1","root","","3306","condominio");

	$nome = $_POST['nome'];

	if ($nome == "0"){
		?><script>location="consultar_todos.php"</script><?php
	}else{
		$strCons = "SELECT * FROM recibos WHERE nome = '$nome' ";
		$cons = db_query($connect, $strCons);
	}
		$campo = mysql_fetch_array($cons);
		$codigo			= $campo['codigo'];
		$nome			= $campo['nome'];
		$vencimento		= $campo['vencimento'];
		$agua_total		= $campo['agua_total'];
		$pessoas_total	= $campo['pessoas_total'];
		$apartamento	= $campo['apartamento'];
		$pessoas		= $campo['pessoas'];
		$cota_agua		= $campo['cota_agua'];
		$cota_condominio= $campo['cota_condominio'];
		$cota_reserva	= $campo['cota_reserva'];


	echo "<table border=1 align=center>";
		echo "<tr><td>C�digo</td><td>$codigo</td></tr>";
		echo "<tr><td>Nome</td><td>$nome</td></tr>";
		echo "<tr><td>Vencimento</td><td>$vencimento</td></tr>";
		echo "<tr><td>Total da �gua</td><td>$agua_total</td></tr>";
		echo "<tr><td>Total de Pessoas</td><td>$pessoas_total</td></tr>";
		echo "<tr><td>Apartamento</td><td>$apartamento</td></tr>";
		echo "<tr><td>Pessoas</td><td>$pessoas</td></tr>";
		echo "<tr><td>Cota da �gua</td><td>$cota_agua</td></tr>";
		echo "<tr><td>Cota do Condom�nio</td><td>$cota_condominio</td></tr>";
		echo "<tr><td>Cota de Reserva</td><td>$cota_reserva</td></tr>";
echo "</table>";

//echo rodape("Julho de 2006");
// Caso a vari�vel de Session n�o esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
