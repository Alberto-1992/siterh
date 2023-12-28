<?php
require '../fpdf186/fpdf.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
class PDF extends FPDF
{
  function Header()
  {
    $this->Image('../imagen/3.png', 12, 10, 50);
    $this->Image('../imagen/2.png', 180, 7, 30);
    $this->SetFont('Arial', 'B', 10);
    $this->Ln(20);

    $this->SetFont('Arial', 'B', 9);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(0, 0, 0);
    $this->SetXY(85, 20);
    $this->MultiCell(50, 3, utf8_decode("CÉDULA DE EVALUACIÓN DE INDUCCIÓN AL PUESTO"), 0, "C");
    //Fecha Posición
    $this->Cell(135);
    $this->Cell(30, 35, utf8_decode("Ixtapaluca,Estado de México a, "), 0, 0, 'C');
    $this->Cell(35, 35, utf8_decode($DateAndTime = date('d-M-Y', Time())), 0, 0, 'C');
    $this->Ln(20);
  }
  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
/////////////////////////////////////////////////////////////////////////////
  

}
?>