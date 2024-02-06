<?php 
/* 
    Hola mundo FPDF
    Parametros clase fpdf

*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Creamos objeto de la clase fpdf
$pdf = new FPDF('P', 'mm', 'A4');

# Establecemos tipo letra
$pdf->SetFont('Courier','',10);

# Añadimos nueva página
$pdf->AddPage();

# Creamos la primera celda
# Usamos la funcion iconv para usar UTF-8
$pdf->Cell(40,10, iconv('UTF-8',  'ISO-8859-1', '¡Hola mundo FPDF!'));

#Añadimos nueva página
$pdf->AddPage('L');

# Establecemos tipo letra
$pdf->SetFont('Arial','',10);

# Usamos la funcion iconv para usar UTF-8
$pdf->Cell(40,10, iconv('UTF-8',  'ISO-8859-1', '¡Hola de nuevo!'));

# Cerramos pdf
$pdf->Output();