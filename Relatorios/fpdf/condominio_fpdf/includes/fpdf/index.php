<?php
//Exemplo de Uso do FPDF gerando PDF através do PDF
//Ribamar FS - ribamar.sousa@dnocs.gov.br

define('FPDF_FONTPATH','fpdf/font/');
require('fpdf.php');
include ("conexao.inc.php");

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',16);
$pdf->SetTitle('Exemplo de Relatório em PDF via PHP');

$fill=0;

$consulta=pg_query($conexao,"select * from funcionarios");
$numregs=pg_num_rows($consulta);

$pdf->Cell(20,10,'SIAPE','1',0,'L',1);
$pdf->Cell(50,10,'Nome','1',1,'L',1);
$pdf->SetFont('Arial','B',10);

	$i=0;
	while($i < $numregs)
	{
		  $siape=pg_result($consulta,$i,siape);  
		  $nome=pg_result($consulta,$i,nome);  

        //Color and font restoration
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');

		  $pdf->Rect(5,5,170,80,'D');
        $pdf->Cell(20,10,$siape,1,0,'R',$fill);
        $pdf->Cell(50,10,$nome,1,1,'L',$fill);
        $fill=!$fill;	//Não fill. Quando 0 muda para 1. Quando 1 muda para 0.
	$i++;
	}

        $pdf->SetFillColor(224,235);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','B',8);
		  $pdf->Line(5,90,90,90);
		  $pdf->Image('mouse.jpg',185,5,10,0,'JPG','http://www.dnocs.gov.br');
		  $pdf->SetY(95); //95mm abaixo
        $pdf->SetX(5);//Deve vir após SetY, pois este volta para a esquerda
        $pdf->Cell(170,5,'PDF gerado via PHP acessando banco de dados - Por Ribamar FS',1,1,'L',1,'mailto:ribafs@dnocs.gov.br');

$pdf->Output();
?> 