<?php
define('FPDF_FONTPATH','includes/fpdf/font/');
require('includes/fpdf/fpdf.php');
include ("includes/funcoes_db.inc.php");

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',12);
$pdf->SetTitle('Condomínio Ferreira - Impressão de Recibos');

$connect=db_connect("127.0.0.1","root","","3306","condominio");
$vencimento=$_POST['vencimento'];
$consulta=mysql_query("select * from recibos WHERE vencimento='$vencimento' order by codigo",$connect);
$numregs=mysql_num_rows($consulta);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

$i=0;
while($i < $numregs){
  	$codigo=mysql_result($consulta,$i,codigo);  
  	$nome=mysql_result($consulta,$i,nome);  
  	$venc=mysql_result($consulta,$i,vencimento);
  	$apartamento=mysql_result($consulta,$i,apartamento);
  	$pessoas=mysql_result($consulta,$i,pessoas);
  	$cota_agua=mysql_result($consulta,$i,cota_agua);
  	$cota_condominio=mysql_result($consulta,$i,cota_condominio);
  	$cota_reserva=mysql_result($consulta,$i,cota_reserva);

$total = $cota_agua + $cota_condominio + $cota_reserva;
$total = number_format($total,2, ',','.');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(90,6,'RECIBO - Total = R$ '.$total,'LTR',0,'C',0);$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(90,6,'RECIBO - Total = R$ '.$total,'LTR',1,'C',0);
$pdf->Cell(90,5,'Condomínio Ferreira','LBR',0,'C',0);$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(90,5,'Condomínio Ferreira','LBR',1,'C',0);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(40,6,"Código",'1',0,'L',1);$pdf->Cell(50,6,$codigo,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,"Código",'1',0,'L',1);$pdf->Cell(50,6,$codigo,'1',1,'L',1);

$pdf->Cell(40,6,"Nome",'1',0,'L',1);$pdf->Cell(50,6,$nome,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,"Nome",'1',0,'L',1);$pdf->Cell(50,6,$nome,'1',1,'L',1);

$pdf->Cell(40,6,'Vencimento','1',0,'L',1);$pdf->Cell(50,6,$venc,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Vencimento','1',0,'L',1);$pdf->Cell(50,6,$venc,'1',1,'L',1);

$pdf->Cell(40,6,'Apartamento','1',0,'L',1);$pdf->Cell(50,6,$apartamento,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Apartamento','1',0,'L',1);$pdf->Cell(50,6,$apartamento,'1',1,'L',1);

$pdf->Cell(40,6,'Pessoas do Apto.','1',0,'L',1);$pdf->Cell(50,6,$pessoas,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Pessoas do Apto.','1',0,'L',1);$pdf->Cell(50,6,$pessoas,'1',1,'L',1);

$pdf->Cell(40,6,'Cota da Água','1',0,'L',1);$pdf->Cell(50,6,$cota_agua,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Cota da Água','1',0,'L',1);$pdf->Cell(50,6,$cota_agua,'1',1,'L',1);

$pdf->Cell(40,6,'Cota do Condomínio','1',0,'L',1);$pdf->Cell(50,6,$cota_condominio,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Cota do Condomínio','1',0,'L',1);$pdf->Cell(50,6,$cota_condominio,'1',1,'L',1);

$pdf->Cell(40,6,'Cota de Reserva','1',0,'L',1);$pdf->Cell(50,6,$cota_reserva,'1',0,'L',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(40,6,'Cota de Reserva','1',0,'L',1);$pdf->Cell(50,6,$cota_reserva,'1',1,'L',1);

$pdf->Cell(90,6,'','LTR',0,'C',0);$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(90,6,'','LTR',1,'C',0);
$pdf->Cell(90,6,'','LR',0,'C',0);$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(90,6,'','LR',1,'C',0);

$pdf->Cell(90,6,'Ribmar Ferreira de Sousa - 121.068.363-68','1',0,'C',1);
$pdf->Cell(10,6,'','0',0,'L',0);
$pdf->Cell(90,6,'Ribmar Ferreira de Sousa - 121.068.363-68','1',1,'C',1);

$pdf->Cell(10,6,'','0',0,'L',0);$pdf->Cell(10,6,'','0',1,'L',0);

if (($i+1)%3 == 0){$pdf->AddPage();}
$i++;
}
	$agua_total=mysql_result($consulta,0,agua_total);
	$pessoas_total=mysql_result($consulta,0,pessoas_total);    

	$pdf->Cell(40,6,'',0,1,'',0);
	$pdf->Cell(40,6,'',0,0,'',0);
	$pdf->Cell(40,6,'Total da Água: ','1',0,'L',1);
    $pdf->Cell(50,6,$agua_total,1,1,'L',1);
	$pdf->Cell(40,6,'',0,0,'',0);
	$pdf->Cell(40,6,'Total de Pessoas: ','1',0,'L',1);
    $pdf->Cell(50,6,$pessoas_total,1,1,'L',1);

	$pdf->Output();
?> 
