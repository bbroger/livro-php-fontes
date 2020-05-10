<?php
// Example FPDF script with PostgreSQL
// Ribamar FS - http://ribafs.org
// Fortaleza - 30/07/2018

// fpdf - http://fpdf.org
// fpdi - https://www.setasign.com/products/fpdi/downloads/
// Exemplos - https://www.setasign.com/products/fpdi/demos/
// O exemplo abaixo foi inspirado neste - https://www.setasign.com/products/fpdi/demos/simple-demo/

require('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');
use setasign\Fpdi\Fpdi;

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Exemplo de Relatório em PDF via PHP');

//Set font and colors
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);

//Table header
$pdf->Cell(60,10,'Apenas um Exemplo',1,0,'L',1);

//Restore font and colors
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

//Add a rectangle, a line, a logo and some text
$pdf->Rect(5,5,170,80);
$pdf->Line(5,90,90,90);
$pdf->SetFillColor(224,235);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(5,95);
$pdf->Cell(170,5,'PDF gerado via PHP - Por Ribamar FS',1,1,'L',1);

// Salvar o resultado acima como editado.pdf
$pdf->Output("editado.pdf", "F");


// Editar o arquivo editado.pdf, adicionando a frase
// Esta frase foi inserida no arquivo

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('editado.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 10, 10, 100);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetXY(12, 30);
$pdf->Write(0, 'Esta frase foi inserida no arquivo:');
$pdf->SetXY(12, 35);
$pdf->Write(0, 'editado.pdf!');

// Para salvar o arquivo editado descomente a linha abaixo
//$pdf->Output("editado2.pdf");

// Apenas mostrar o arquivo editado no navegador
$pdf->Output();

