<?php 
/* 
    Hola mundi FPDF

*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Creamos objeto de la clase fpdf
$pdf = new FPDF();

# Añadimos nueva página
$pdf->AddPage();

# Establecemos tipo letra
$pdf->SetFont('Arial','B',12);

# Creamos la primera celda
# Usamos la funcion iconv para usar UTF-8
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1', '¡Hola mundo FPDF!'));

# Cerramos pdf
$pdf->Output();