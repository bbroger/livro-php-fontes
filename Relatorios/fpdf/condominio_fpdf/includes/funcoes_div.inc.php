<?php
// Funções diversas

function espacos_br($n){
	for ($x=1;$x<$n;$x++){
		$espacos .="&nbsp";
	}
	return $espacos;
}

function linhas_br($n){
	for ($x=1;$x<$n;$x++){
		$linhas .="<br>";
	}
	return $linhas;
}

function data(){
	return date("d/m/Y");
}

function hora(){
	return date("H:i:s");
}

function email_valida($email){
	if (!eregi("^[A-Za-z._-]+@[A-Za-z-]{1,}\.[a-z]{2,3}",$email)){
		?><script>alert("E-mail inválido!")</script><?php
		exit;
	}
}

function data_valida($data){
	$d = explode("/",$data);
	$d2 = checkdate ($d[1],$d[0],$d[2]);
	if (!$d2){
		?><script>alert("A data "+<?=$d[0].$d[1].$d[2] ?>+" não é válida!")</script><?php
		exit;
	}
}

function cep_valida($cep){
	if (!eregi("^[0-9]{5}[0-9]{3}",$cep)){
		?><script>alert("CEP "+"<?=$cep ?>"+" inválido! Use o formato 60420440")</script><?php
		exit;
	}
}

/* Rotina para ativar um checkbox com valor vindo do banco
<input type="checkbox" name="ativo" <? if($_POST['ativo']=="on") {echo "CHECKED";}else{$ativo='off';} ?> >
*/

/* Retorna 0 se falso e 1 se verdadeiro */
function cpf_valida0($cpf) {
/*
*/
$nulos = array("12345678909","11111111111","22222222222","33333333333",
               "44444444444","55555555555","66666666666","77777777777",
               "88888888888","99999999999","00000000000");
/* Retira todos os caracteres que nao sejam 0-9 */
$cpf = ereg_replace("[^0-9]", "", $cpf);

/*Retorna falso se houver letras no cpf */
if (!(ereg("[0-9]",$cpf)))
    return 0;

/* Retorna falso se o cpf for nulo */
if( in_array($cpf, $nulos) )
    return 0;

/*Calcula o penúltimo dígito verificador*/
$acum=0;
for($i=0; $i<9; $i++) {
  $acum+= $cpf[$i]*(10-$i);
}

$x=$acum % 11;
$acum = ($x>1) ? (11 - $x) : 0;
/* Retorna falso se o digito calculado eh diferente do passado na string */
if ($acum != $cpf[9]){
  return 0;
}
/*Calcula o último dígito verificador*/
$acum=0;
for ($i=0; $i<10; $i++){
  $acum+= $cpf[$i]*(11-$i);
}   

$x=$acum % 11;
$acum = ($x > 1) ? (11-$x) : 0;
/* Retorna falso se o digito calculado eh diferente do passado na string */
if ( $acum != $cpf[10]){
  return 0;
}   
/* Retorna verdadeiro se o cpf eh valido */

return 1;
}

function cpf_valida($cpf){
	if (!cpf_valida0($cpf)){
		?><script>alert("CPF "+"<?=$cpf ?>"+" inválido!")</script><?php
		exit;
	}
}

?>
