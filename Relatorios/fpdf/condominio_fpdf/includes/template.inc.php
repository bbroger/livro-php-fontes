<?php
// Arquivo de inclusão com funções úteis ao aplicativo

function menu(){
$menu="<center>

<input type=\"button\" value=\"Inserir\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='inserir.php'\" title=\"Inserir Registros\"> 

<input type=\"button\" value=\"Consultar\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='consultar.php'\" title=\"Consultar Registros\">

<input type=\"button\" value=\"Recibos\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='recibos.php'\" title=\"Imprimir Recibos\">

<input type=\"button\" value=\"Atualizar\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='atualizar.php'\" title=\"Atualizar Registros\"> 

<input type=\"button\" value=\"Excluir\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='excluir.php'\" title=\"Excluir Registros\"> 

<input type=\"button\" value=\"Sair\" style=\"background:yellow; color: black; font-size: 0.6em\" onClick=\"location='sair.php'\" title=\"Fazer logof do sistema\"> 

</center><HR WIDTH=90%>";
	return $menu;
}

function fontes($arquivo){
	$fontes="<center><input type=\"button\" onClick=\"window.open('$arquivo','700x600',
	'toolbar=no,scrollbars=yes,menubar=no,directories=no,width=700,height=600,left=100,top=50');\"
	Value=\"Fontes\" style=\"background:white; color: black; font-size: 0.6em\" TITLE=\"Código fonte deste script\">";
	return $fontes;
}

function fundo($cor,$form,$campo){
	$fundo="<body bgcolor=$cor onLoad=document.$form.$campo.focus()>";
	return $fundo;
}

function cabecalho($titulo, $subtitulo, $subtitulo2=""){
	$cabecalho="<H1 style=\"font-family:'Arial Black',Times,'Lucida Handwriting',cursive;\" 
align=\"center\"><font color=\"green\">$titulo</font></H1><H3 align=\"center\"><font color=\"green\">$subtitulo</font></H3><h5 align=\"center\">$subtitulo2</h5>
<HR WIDTH=90%>";
	return $cabecalho;
}

function rodape($data){
	$rodape="<HR WIDTH=90%><center><font size=\"2\">Ribamar FS - <a href=\"http://ribafs.tk\">http://ribafs.tk</a> - ribafs[ ]gmail.com<br><HR WIDTH=90%>$data</font></center>";
	return $rodape;
}

// Ribamar FS - ribafs.tk - ribafs[ ]gmail.com - Julho de 2006	
?>
