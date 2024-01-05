<?php
require 'fpdf186/fpdf.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('d-m-Y', time());
class PDF extends FPDF
{
  function Header()
  {
    //$this->Image('reporteBecatiempo/imagen/3.png', 10, 8, 40);
    $this->Image('reporteBecatiempo/imagen/2.png', 10, 4, 20);
    $this->SetFont('Arial', 'B', 10);
  
    
    //Fecha Posición
    $this->Ln(3);
    $this->Cell(125);
    
    $this->Ln(0);
    $this->Cell(137);
    $this->SetFont('Arial', 'B', 9);
    $this->Text(20, 100, $this->MultiCell(90, 3, utf8_decode("                                      Dirección General
 Dirección de Administración y Finanzas
      Subdirección de Recursos Humanos"), 0, 1));
  }
  function Footer()
  {
    $this->SetY(-15);
    //Arial italic 8
    
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Image('imagenes/imagen1.jpg' , 5 ,260, 210 , 20);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }
}
?>