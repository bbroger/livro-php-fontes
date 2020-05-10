<?php
// Exemplo adaptado de artigo de Adriano de Oliveira Gon�alves na Revista PHP, de:
// http://www.revistaphp.com.br/artigo.php?id=80

ob_start();

include("FAQ.htm");
readfile("install.txt"); // Continuando o documento, sem quebra de p�gina
?>

<h1>Ribamar FS</h1> <!-- Esta formata��o n�o ser� respeitada, mas a fonte do PDF prevalecer� -->

<?php

$conteudo_html = nl2br(ob_get_clean());
// Peguei o conte�do do buffer, joguei na vari�vel $conteudo, limpei o buffer e parei de armazenar

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