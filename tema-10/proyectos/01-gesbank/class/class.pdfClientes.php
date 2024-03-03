<?php
require('fpdf/fpdf.php');

class pdfClientes extends FPDF
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
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1','Listado de Clientes'), 0, 1, 'C');
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
        $this->Cell(10, 7, iconv('UTF-8','ISO-8859-1','Id'), 1, 0, 'C', true);
        $this->Cell(60, 7, iconv('UTF-8','ISO-8859-1','Cliente'), 1, 0, 'C', true);
        $this->Cell(25, 7, iconv('UTF-8','ISO-8859-1','Teléfono'), 1, 0, 'C', true);
        $this->Cell(40, 7, iconv('UTF-8','ISO-8859-1','Email'), 1, 0, 'C', true);
        $this->Cell(20, 7, iconv('UTF-8','ISO-8859-1','Dni'), 1, 0, 'C', true);
        $this->Cell(35, 7, iconv('UTF-8','ISO-8859-1','Ciudad'), 1, 1, 'C', true);
        // Salto de línea
        $this->Ln(0.5);
    }

    function Contenido($clientes)
    {
        // Cargar el encabezado de la tabla
        $this->HeaderLista();
        // Antes de recorrer los clientes, definir la tipografía
        $this->SetFont('Arial', '', 10);
        // Recorrer los datos y mostrarlos en filas
        foreach ($clientes as $cliente) {
            // Controlar saltos de página
            if ($this->GetY() + 8 > $this->PageBreakTrigger) {
                $this->AddPage();
                $this->HeaderLista();
            }
            // Añadir valores a las celdas
            $this->Cell(10, 9, iconv('UTF-8','ISO-8859-1',$cliente->id), 1, 0, 'C');
            $this->Cell(60, 9, iconv('UTF-8','ISO-8859-1',$cliente->cliente), 1, 0, 'L');
            $this->Cell(25, 9, iconv('UTF-8','ISO-8859-1',$cliente->telefono), 1, 0, 'C');
            $this->Cell(40, 9, iconv('UTF-8','ISO-8859-1',$cliente->email), 1, 0, 'L');
            $this->Cell(20, 9, iconv('UTF-8','ISO-8859-1',$cliente->dni), 1, 0, 'C');
            $this->Cell(35, 9, iconv('UTF-8','ISO-8859-1',$cliente->ciudad), 1, 1, 'C');
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