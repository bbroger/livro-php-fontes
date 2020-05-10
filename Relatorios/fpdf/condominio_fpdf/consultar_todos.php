<?php
session_start();
if (isset($_SESSION['login'])){

require_once("includes/template.inc.php");
require_once("includes/funcoes_db.inc.php");
require_once("includes/funcoes_div.inc.php");

$connect=db_connect("127.0.0.1","root","","3306","condominio");
//$connect=mysql_connect("127.0.0.1","root","");
//mysql_select_db("condominio",$connect);

echo fundo("blanchedalmond","frmCon","nome");
echo cabecalho("Condomínio Ferreira", "Consulta de Recibos");
echo menu();
echo linhas_br(2);

/******************Início da Paginação ****/
/* Adaptação do original em http://www.php-mysql-tutorial.com/php-mysql-paging.php 
   por Ribamar FS para o PostgreSQL*/

// how many rows display per page - quantos registros por página
$rowsPerPage = 10; 

// for defaul display the first page 
$pageNum = 1; 

// if $_GET['page'] is definede, use this to page numbers 
if(isset($_GET['page'])) 
{ 
    $pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 
/****************** Final 1a parte Paginação ****/
	
	$strCons = "SELECT * FROM recibos order by codigo LIMIT $offset,$rowsPerPage";

	$cons = db_query($connect,$strCons);
	//$cons = mysql_query($strCons,$connect);
		
	//$campo = mysql_fetch_array($cons);
	$nf=mysql_num_fields($cons);

	echo "<table border=1 align=center style=\"font-size: smaller;\">";
	echo "<tr><td><b>Código</td><td><b>Nome</td><td><b>Vencimento</td><td><b>Apartamento</td><td><b>Pessoas</td><td><b>Cota da Água</td><td><b>Cota do Condomínio</td><td><b>Cota de Reserva</td></tr>";

	$row=0;
	$dataa="";
	$datap;

	while ($data=mysql_fetch_array($cons)) {
		echo "<tr>";
		for($x=0;$x < $nf;$x++){
   		  if ($x==3 || $x==4){
		  // 
		  }else{
			if ($row%2==0){ // Se registros pares, cor de fundo beige, se não, normal
		   		echo "<td bgColor=honeydew>".$data[$x]."</td>"; 
				// Cores alternativas: turquoise,mediumseagreen,honeydew,seagreen , lightgreen, 
				// mediumaquamarine, lightcyan, palegreen
			}else{
				$dataa=$data[3];
				$datap=$data[4];
		   		echo "<td>".$data[$x]."</td>";
			}
		  }
		}
   		$row++;
		echo "</tr>";
	}	
	echo "</table>";
	echo "<center>Total da Água = $dataa - Total de Pessoas = $datap.</center>";


/****************** Início 2a. parte Paginação ***/
// how many registers in table 
$query   = "SELECT COUNT(nome) AS numrows2 FROM recibos";
$result  = mysql_query($query) or die('Erro, Falhou a consulta!');
$row     = mysql_fetch_array($result); 
$numrows2 = $row['numrows2']; 

// how many pages in paging? 
$maxPage = ceil($numrows2/$rowsPerPage); 

// print access link to each page 

$self = $_SERVER['PHP_SELF']; 
$nav = ''; 

for($page = 1; $page <= $maxPage; $page++) 
{ 
    if ($page == $pageNum) 
    { 
        $nav .= " $page ";   // do not require create a link to current page 
    } 
    else 
    { 
        $nav .= " <a href=\"$self?page=$page\">$page</a> ";
    }
} 

// create links Previous and Next more the link to First and the Last 

if ($pageNum > 1) { 
    $page = $pageNum - 1; 
    $prev = " <a href=\"$self?page=$page\"><img src=\"includes/images/paginacao/reg_prev.gif\" TITLE=\"Página Anterior\"></a> "; 

    $first = " <a href=\"$self?page=1\"><img src=\"includes/images/paginacao/reg_first.gif\" TITLE=\"Primeira Página\"></a> "; 
} else { 
    $prev = " <a href=\"#\"><img src=\"includes/images/paginacao/reg_prevdisab.gif\" TITLE=\"Página Anterior\"></a> ";
    $first = " <a href=\"#\"><img src=\"includes/images/paginacao/reg_firstdisab.gif\" TITLE=\"Primeira Página\"></a>";
} 

if ($pageNum < $maxPage) { 
    $page = $pageNum + 1; 
    $next = " <a href=\"$self?page=$page\"><img src=\"includes/images/paginacao/reg_next.gif\" TITLE=\"Próxima Página\"></a> "; 

    $last = " <a href=\"$self?page=$maxPage\"><img src=\"includes/images/paginacao/reg_last.gif\" TITLE=\"Última Página\"></a> "; 
} else { 
    $next = " <a href=\"#\"><img src=\"includes/images/paginacao/reg_nextdisab.gif\" TITLE=\"Próxima Página\"></a> ";
    $last = " <a href=\"#\"><img src=\"includes/images/paginacao/reg_lastdisab.gif\" TITLE=\"Última Página\"></a>";
} 

// mostra os links de navegação 
echo "<center>".$first . $prev . $nav . $next . $last; 
/******************Final da paginação */

	echo linhas_br(5);
	echo rodape("Julho de 2006");

// Caso a variável de Session não esteja setada...
}else{
	?><script>alert ('Acesso ilegal!');
		location='index.php';
	  </script>
	<?php
}
?>
