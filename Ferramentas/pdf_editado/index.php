<?php
// Editando pdf com PHP
// Ribamar FS - http://ribafs.org
// Fortaleza - 31/07/2018

// fpdf - http://fpdf.org
// fpdi - https://www.setasign.com/products/fpdi/downloads/
// Exemplos - https://www.setasign.com/products/fpdi/demos/
// O exemplo abaixo foi inspirado neste - https://www.setasign.com/products/fpdi/demos/simple-demo/
// Exemplo editando todo um documento - https://manuals.setasign.com/fpdi-manual/v2/the-fpdi-class/examples/#index-2

require('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');
use setasign\Fpdi\Fpdi;

// Editar o arquivo original.pdf, adicionando uma frase: Comentário adicionado com o FPDI

// initiate FPDI
$pdf = new Fpdi();

// get the page count
$pageCount = $pdf->setSourceFile('original.pdf');
// iterar por todas as páginas, importando todo o documento
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    // import a page
    $templateId = $pdf->importPage($pageNo);

    $pdf->AddPage();
    // use the imported page and adjust the page size
    $pdf->useTemplate($templateId, ['adjustPageSize' => true]);

    $pdf->SetFont('Helvetica');
    $pdf->SetXY(5, 5);
    $pdf->Write(8, 'Comentário adicionado com o FPDI');
}

// Salvará o arquivo editado e mostrará o resultado no navegador

// Para salvar o arquivo editado
$pdf->Output("editado.pdf", "f");

// Para mostrar o arquivo editado no navegador
$pdf->Output();

