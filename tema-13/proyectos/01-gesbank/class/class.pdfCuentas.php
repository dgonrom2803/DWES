<?php
require('fpdf/fpdf.php');

class pdfCuentas extends FPDF
{
    function __construct()
    {
        // Llamada al constructor de FPDF
        parent::__construct();

        // Añadir una nueva página
        $this->AddPage();

        // Llamar al método Titulo para mostrar el encabezado
        $this->Titulo();
    }

    function Header()
    {
        // Encabezado
        $this->SetFont('Arial', 'B', 12);

        $this->Cell(60, 10, iconv('UTF-8','ISO-8859-1','GESBANK 1.0'), 0, 0, 'L');
        $this->Cell(60, 10, iconv('UTF-8','ISO-8859-1','Diego González Romero'), 0, 0, 'C');
        $this->Cell(60, 10, iconv('UTF-8','ISO-8859-1','2DAW 23/24'), 0, 1, 'R');
        // Borde inferior
        $this->Cell(0, 0, '', 'T', 1, 'C');
    }
    function Titulo()
    {
        // Título del PDF
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1','Listado de Cuentas'), 0, 1, 'C');
        // Fecha actual
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1','Fecha: ' . date('d/m/Y H:i')), 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
    }

    function HeaderLista()
    {
        // Establecer la tipografía y el tamaño de fuente
        $this->SetFont('Arial', 'B', 10);
        // Añadir color de fondo (relleno)
        $this->SetFillColor(190, 190, 190);
        // Crear las celdas con los títulos de cada columna
        $this->Cell(15, 7, iconv('UTF-8','ISO-8859-1','Id'), 1, 0, 'C', true);
        $this->Cell(50, 7, iconv('UTF-8','ISO-8859-1','Número de Cuenta'), 1, 0, 'C', true);
        $this->Cell(50, 7, iconv('UTF-8','ISO-8859-1','Cliente'), 1, 0, 'C', true);
        $this->Cell(45, 7, iconv('UTF-8','ISO-8859-1','Fecha de Alta'), 1, 0, 'C', true);
        $this->Cell(30, 7, iconv('UTF-8','ISO-8859-1','Saldo'), 1, 1, 'C', true);
        // Salto de línea
        $this->Ln(0.5);
    }

    function Contenido($cuentas)
    {
        // Cargar el encabezado de la tabla
        $this->HeaderLista();
        // Antes de recorrer las cuentas, definir la tipografía
        $this->SetFont('Arial', '', 10);
        // Recorrer los datos y mostrarlos en filas
        foreach ($cuentas as $cuenta) {
            // Controlar saltos de página
            if ($this->GetY() + 8 > $this->PageBreakTrigger) {
                $this->AddPage();
                $this->HeaderLista();
            }
            // Añadir valores a las celdas
            $this->Cell(15, 9, iconv('UTF-8','ISO-8859-1',$cuenta->id), 1, 0, 'C');
            $this->Cell(50, 9, iconv('UTF-8','ISO-8859-1',$cuenta->num_cuenta), 1, 0, 'L');
            $this->Cell(50, 9, iconv('UTF-8','ISO-8859-1',$cuenta->cliente), 1, 0, 'C');
            $this->Cell(45, 9, iconv('UTF-8','ISO-8859-1',$cuenta->fecha_alta), 1, 0, 'C');
            $this->Cell(30, 9, iconv('UTF-8','ISO-8859-1',$cuenta->saldo), 1, 1, 'C');
        }
    }
    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', '', 10);
        // Borde superior
        $this->Cell(0, 0, '', 'T', 1, 'C');
        // Contador de páginas
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}
?>
