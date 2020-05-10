<?php
// Exemplo adaptado de artigo de Adriano de Oliveira Gonçalves na Revista PHP, de:
// http://www.revistaphp.com.br/artigo.php?id=80

ob_start();

include("FAQ.htm");
readfile("install.txt"); // Continuando o documento, sem quebra de página
?>

<h1>Ribamar FS</h1> <!-- Esta formatação não será respeitada, mas a fonte do PDF prevalecerá -->

<?php

$conteudo_html = nl2br(ob_get_clean());
// Peguei o conteúdo do buffer, joguei na variável $conteudo, limpei o buffer e parei de armazenar

require_once('html2pdf.php');

$pdf = new PDF();
$pdf->Open();
$pdf->SetFont('Arial','',8);
$pdf->AddPage();

$pdf->SetMargins(10,10,10);

$pdf->WriteHTML($conteudo_html);
$pdf->Output('minha_pagina.pdf','I'); // Cria o arquivo e mostra (I)
//$pdf->Output();  // Apenas mostra sem criar o arquivo
?>