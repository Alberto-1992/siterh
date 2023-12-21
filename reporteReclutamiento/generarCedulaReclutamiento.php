<?php
require '../fpdf186/fpdf.php';

class PDF extends FPDF
{
  // Cabecera de página
  function Header()
  {
    // Logo
    $this->Image('../imagenes/1.png', 8, 5, 18);
    // Arial bold 15
    $this->SetFont('Arial', 'B', 20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30, 10, mb_convert_encoding('Cedula de evaluación', 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
    // Salto de línea
    $this->Ln(15);
  }

  // Pie de página
  function Footer()
  {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Número de página
    $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }

}


?>