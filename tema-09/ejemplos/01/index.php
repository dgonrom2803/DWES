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
# Usamos la funcion mb_convert_encoding para usar UTF-8
$pdf->Cell(40,10, mb_convert_encoding('¡Hola mundo FPDF!', 'ISO-8859-1', 'UTF-8'));

# Cerramos pdf
$pdf->Output();