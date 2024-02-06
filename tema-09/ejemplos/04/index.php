<?php 
/* 
    Hola mundo FPDF
    Parametros clase fpdf

*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Declaro unas variables
$id = 1;
$apellidos = 'García Pérez';
$nombre = 'Juan';

# Creamos objeto de la clase fpdf mismos parametros defecto
// $pdf = new FPDF();
$pdf = new FPDF('P', 'mm', 'A4');

# Establecemos tipo letra
$pdf->SetFont('Courier','',10);

# color fondo celda
$pdf->SetFillColor(240, 120, 10);


# Añadimos nueva página
$pdf->AddPage();

# Creamos la primera celda
# Usamos la funcion iconv para usar UTF-8
$pdf->Cell(60,10, iconv('UTF-8',  'ISO-8859-1', 'Id: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8',  'ISO-8859-1', $id), 1, 1);
$pdf->Cell(60,10, iconv('UTF-8',  'ISO-8859-1', 'Nombre: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8',  'ISO-8859-1', $nombre), 1, 1);
$pdf->Cell(60,10, iconv('UTF-8',  'ISO-8859-1', 'Apellidos: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8',  'ISO-8859-1', $apellidos), 1, 1);


# Cerramos pdf
$pdf->Output('D', 'informe.pdf', true);