<?php
require 'fpdf186/fpdf.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
class PDF extends FPDF
{
  function Header()
  {
    $this->Image('reporteBecatiempo/imagen/3.png', 10, 8, 40);
    $this->Image('reporteBecatiempo/imagen/2.png', 55, 4, 20);
    $this->SetFont('Arial', 'B', 10);
  
    $this->Cell(60);
    $this->SetFont('Arial', 'B', 9);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(0, 0, 0);
    $this->SetXY(83, 25);
    $this->MultiCell(50, 3, utf8_decode("PERMISO ADMINISTRATIVO (beca tiempo menor a 30 dias)"), 0, "C");
    //Fecha Posición
    $this->Ln(3);
    $this->Cell(125);
    $this->Cell(25, 10, utf8_decode("Ixtapaluca,Estado de México a,"), 0, 0, 'C');
    $this->Ln(-20);
    $this->Cell(137);
    $this->SetFont('Arial', 'B', 9);
    $this->Text(20, 100, $this->MultiCell(90, 3, utf8_decode("                                      Dirección General
 Dirección de Administración y Finanzas
      Subdirección de Recursos Humanos"), 0, 1));
    $this->Ln(10);
    $this->SetFont('Arial', 'B', 7);
    $this->Text(20, 100, $this->MultiCell(55, 3, utf8_decode("MTRO. HUGO FRANCISCO ROSAS CUEVAS 
SUBDIRECTOR DE RECURSOS HUMANOS
PRESENTE"), 0, 1));
  }
  function Footer()
  {
    $this->SetY(-15);
    //Arial italic 8
    
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Image('imagenes/logopie2023.png' , 0 ,260, 220 , 20);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }
}
?>