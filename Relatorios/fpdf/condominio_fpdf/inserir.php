<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");
require_once("includes/funcoes_div.inc.php");

$connect=db_connect("127.0.0.1","root","","3306","condominio");
/* A linha abaixo no início do script permite digitar os nomes das variáveis
   sem usar $_POST ou $_GET:
   import_request_variables("gP");
*/
?>

<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Condomínio Ferreira</title>
<!-- Calendário -->
	<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendario/CalendarPopup.js"></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendario/PopupWindow.js"></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendario/date.js"></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendario/AnchorPosition.js"></SCRIPT>	
	<SCRIPT LANGUAGE="JavaScript">
	var cal = new CalendarPopup();
	</SCRIPT>
<!-- /Calendário-->
</head>
<?php

echo fundo("blanchedalmond","frmIns","nome");
echo cabecalho("Condomínio Ferreira", "Inserir novo Recibo");
echo menu();

?>

<form name="frmIns" action="inserir.php" method="POST">
<table border=0 align="center">

<tr><td><u>N</u>ome<b><font color=red>*</font></b></td><td><input type="text" name="nome" size="30" maxlength="45" accesskey="N" TABINDEX=1 value="<?=$_POST['nome']; ?>"></td></tr>

<tr><td><u>V</u>encimento<b><font color=red>*</font></b></td><td><input type="text" name="vencimento" size="10" maxlength="10" accesskey="V" TABINDEX=2 value="<?=$_POST['vencimento']; ?>"  OnKeyUp="mascara_data (this.value,9)">
<A HREF="#" onClick="cal.select(document.forms['frmIns'].vencimento,'anchor1','dd/MM/yyyy'); 
return false;" ID="anchor1" <IMG src="includes/calendario/calendar.gif" alt="Calendário")></A> 
</td></tr>

<tr><td><u>T</u>otal da Água<b><font color=red>*</font></b></td>
<td><input type="text" name="agua_total" size="10" maxlength="10" accesskey="T" TABINDEX=3
value="<?=$_POST['agua_total']; ?>"></td></tr>

<tr><td>Total de <u>P</u>essoas<b><font color=red>*</font></b></td>
<td><input type="text" name="pessoas_total" size="10" maxlength="10" accesskey="P" TABINDEX=4 
value="<?=$_POST['pessoas_total']; ?>"></td></tr>

<tr><td><u>A</u>partamento<font color=red>*</font></b></td>
<td><input type="text" name="apartamento" size="4" maxlength="3" accesskey="A" TABINDEX=5 
value="<?=$_POST['apartamento']; ?>"></td></tr>

<tr><td>P<u>e</u>ssoas</u><font color=red>*</font></td><td><input type="text" name="pessoas" size="3" maxlength="2" accesskey="E" TABINDEX=6 value="<?=$_POST['pessoas']; ?>"
onBlur="(cota_agua.value=Math.round(((agua_total.value/pessoas_total.value)*pessoas.value)*10)/10)"></td></tr>

<tr><td><u>C</u>ota da Água<font color=red>*</font></td><td><input type="text" name="cota_agua" size="12" maxlength="12" accesskey="C" TABINDEX=7></td></tr>

<tr><td>C<u>o</u>ta do Condomínio<font color=red>*</font></td><td><input type="text" name="cota_condominio" size="12" maxlength="12" accesskey="O" TABINDEX=8 value="<?=$_POST['cota_condominio']; ?>"></td></tr>

<tr><td>Cota de <u>R</u>eserva<font color=red>*</font></td><td><input type="text" name="cota_reserva" size="12" maxlength="12" accesskey="R" TABINDEX=9 value="<?=$_POST['cota_reserva']; ?>"></td></tr>

<tr><td></td><td><input type="submit" name="enviar" value="Cadastrar" accesskey="V" TABINDEX=13></td></tr></table></form>

<?php
echo rodape("Julho de 2006");

 if ($_POST['enviar']=="Cadastrar"){	// Ao clicar no botão Enviar
	$nome=$_POST['nome'];
	$vencimento=$_POST['vencimento'];
	$agua_total=$_POST['agua_total'];
	$pessoas_total=$_POST['pessoas_total'];
	$apartamento=$_POST['apartamento'];
	$pessoas=$_POST['pessoas'];
	$cota_agua=$_POST['cota_agua'];
	$cota_condominio=$_POST['cota_condominio'];
	$cota_reserva=$_POST['cota_reserva'];

	if($nome == "" || $vencimento == "" || $agua_total=="" || $pessoas_total =="" || 			  		$apartamento=="" || $pessoas =="" || $cota_agua=="" || $cota_condominio =="" || 
	$cota_reserva==""){
		?><script>alert("Favor preencher todos os campos com "+<b>*</>+"!")</script><?php
		exit;
	}
		$table="recibos";
		$fields="nome, vencimento, agua_total, pessoas_total, apartamento, pessoas, cota_agua, 		cota_condominio, cota_reserva "; 
		$values="'$nome', '$vencimento', $agua_total, $pessoas_total, '$apartamento', $pessoas,
	 	$cota_agua, $cota_condominio, $cota_reserva";
		// Observar que campos numéricos não são delimitados por ''
		
		echo db_insertreg($connect, $table, $fields, $values);

    ?><script>location='inserir.php';
	</script>
	<?php
 }

// Caso a variável de Session não esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
