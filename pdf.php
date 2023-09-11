<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        global $i;
        $imagen = sprintf('documento/rm_328_2019_mimp_anexo-nuevo (1)_page-%04d.jpg', $i + 1, $i + 1);
        $this->Image($imagen, 0, 0, $this->w, $this->h);
        $i++;
    }
}

$pdf = new PDF();

$i = 0;
while ($i < 19) {
    $pdf->AddPage();
}

$pdf->Output();

// Si deseas mostrar el PDF en el navegador
// descomenta las siguientes líneas
// header('Content-Type: application/pdf');
// $pdf->Output('pantalla_completa.pdf', 'I');
?>
