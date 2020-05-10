<?php
/*
FUNÇÕES DE INTEGRAÇÃO DO PHP COM SGBDs (POSTGRESQL)

Passos para manipulação de bancos de dados PostgreSQL:

1 - Conectar a um banco de dados (pg_connect)
2 - Executar uma consulta ao banco (pg_query)
3 - Retornar algo da consulta (campos, registros, etc)
*/

function db_connect($host,$user,$pass,$port="",$db){
	$connect = mysql_connect($host.":$port", $user, $pass);
	$sel=mysql_select_db($db,$connect);
	if (!($connect OR $sel)){
		?><script>alert("Erro na conexão ao banco! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		return $connect;
	}
}

function db_query($connect, $str){
	$result = mysql_query($str,$connect);
	if  (!$result) {
		?><script>alert("Erro na query! Detalhes abaixo!")</script><?
		echo mysql_error($connect)." Erro Nr.: " . mysql_errno();
		exit;
  	}else{
		return $result;
  	}
}

// Deve ser chamada com 'echo db_numfiels($result)'
function db_numfields($result){	
	$nf = mysql_num_fields($result);
	if (!$nf){
		?><script>alert("Erro na consulta mysql_num_fields! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		return $nf;
	}
}

// Deve ser chamada com 'echo db_fieldnames($result)'
function db_fieldnames($result){
	$i = db_numfields($result);
	$fn = "<tr>";
   	for ($j = 0; $j < $i; $j++) {
       $fieldname = mysql_field_name($result, $j);
       $fn .= "<td>" . $fieldname . "</td>";
	}
	   $fn .= "</tr>";
	if (!$fieldname){
		?><script>alert("Erro na consulta mysql_field_name! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		return $fn;
	}	
}

function db_numrows($result){
	$nr = mysql_num_rows($result);
	
/*	if (!$nr){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		return $nr;
	}	
*/
	return $nr;	
}

function db_insertreg($connect, $table, $fields, $values){
//	global $returns;
	$strInsert = "INSERT INTO $table ($fields) VALUES ($values)";
	$returns = mysql_query($strInsert,$connect);
	
	if (!$returns){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		?><script>alert("Cliente cadastrado com sucesso!")</script><?
	}
}

function db_updatereg($connect, $table, $fieldsvalues, $where){
	$strUpdate = "UPDATE $table SET $fieldsvalues $where";
	$returns = mysql_query($strUpdate,$connect);
	
	if (!$returns){
		?><script>alert("Erro na consulta update! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		?><script>alert("Registro atualizado com sucesso!")</script><?php
	}
}

function db_deletereg($connect, $table, $where){
	$strDelete = "DELETE FROM $table $where";
	$returns = mysql_query($strDelete,$connect);
	
	if (!$returns){
		?><script>alert("Erro na consulta delete! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		?><script>alert("Registro excluído com sucesso!")</script><?php
	}
}

// Deve ser chamada com 'echo db_returnreg($connect, $table, $where)'
function db_returnreg($connect, $table, $where){
	$strSelect1 = "SELECT * $table $where";
	$returns = mysql_query($strSelect1,$connect);

	$row=0;
	$nf=db_numfields($results);
	while ( $data = mysql_fetch_array($returns)) {
		$regs = "<tr>";
		for($x=0;$x < $nf;$x++){
    		$regs .= "<td>" . $data[$x] . "</td>";
		}
   		$row++;
		$regs .= "</tr>";
	}	
	if (!$returns){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($connect);
		exit;
	}else{
		return $regs;
	}
}

/**** classe combo *****
Adaptação de Ribamar FS de código encontrado em http://www.web-max.ca/PHP/postgres_2.php 
Exemplo de uso (veja que precisa do início e final do Select):

echo "<select name=cod_interacao>";
$query = "select * from interacoes order by nome";
new combo($connect, $cod_interacao, $query, $blank="Selecione");
echo "</select>";
*****/

// Vai ao banco e mostra um campo

function combo($linkID,$default,$query,$blank){
    if($blank){
        print("<option select value=\"0\">$blank</option>");
    }

    $resultID = mysql_query($query,$linkID);

	if (!$resultID){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($linkID);
		exit;
	}

    $num       = mysql_num_rows($resultID); 

	if ($num <=0){
		?><script>alert("Nenhum registro cadastrado!")</script><?
		echo mysql_error($linkID);
		exit;
	}
    for ($i=0;$i<$num;$i++) {
        $row = mysql_fetch_row($resultID);
        
		if (!$row){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($linkID);
			exit;
		}

        if($row[0]==$default)$dtext = "selected";
        else $dtext = "";
    
        print("<option $dtext value=\"$row[0]\">$row[1]</option>");
    }
}

// Vai ao banco e mostra dois campos

function combo2($linkID,$default,$query,$blank){
    if($blank){
        print("<option select value=\"0\">$blank</option>");
    }

    $resultID = mysql_query($query,$linkID);

	if (!$rerultID){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo query_error($linkID);
		exit;
	}

    $num = mysql_num_rows($resultID); 

	if ($num <=0){
		?><script>alert("Nenhum registro cadastrado!")</script><?
		echo mysql_error($linkID);
		exit;
	}

    for ($i=0;$i<$num;$i++) {
        $row = mysql_fetch_row($resultID);

	if (!$row){
		?><script>alert("Erro na consulta! Detalhes abaixo!")</script><?
		echo mysql_error($linkID);
		exit;
	}
        
        if($row[0]==$default)$dtext = "selected";
        else $dtext = "";
    
        print("<option $dtext value=\"$row[0]\">$row[0] - $row[1]</option>");
    }
}

// Ribamar FS - 21/06/2006 - ribafs[ ]users.sourceforge.net
?>
