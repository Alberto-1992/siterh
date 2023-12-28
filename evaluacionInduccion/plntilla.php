<?php
require '../fpdf186/fpdf.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
class PDF extends FPDF
{
  function Header()
  {
    $this->Image('imagenes/3.png', 12, 10, 40);
    $this->Image('imagenes/4.png', 50, 8, 40);
    $this->SetFont('Arial', 'B', 10);
    $this->SetFont('Arial', 'I', 9);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(0, 0, 0);
    $this->SetXY(140, 12);
    $this->MultiCell(80, 3, utf8_decode("                                     Dirección General
    Direccion de administracion y finanzas
      Subdirección de Recursos Humanos"), 0, "");
    $this->Ln(20);

    $this->SetFont('Arial', 'B', 9);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(0, 0, 0);
    $this->SetXY(70, 28);
    $this->MultiCell(90, 3, utf8_decode("CÉDULA DE EVALUACIÓN DE INDUCCIÓN AL PUESTO."), 0, "C");
    //Fecha Posición
    $this->SetFont('Arial', 'B', 7);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(0, 0, 0);
    $this->Ln();
    $this->Write(3, utf8_decode("OBJETIVO: Evaluar la información proporcionada al empleado de nuevo ingreso con respecto a las funciones de su puesto y las principales características del área y/o servicio en el cual se va a desempeñar."), 0, );
    $this->Cell(95, 7, utf8_decode(""), 0, 0, '');
    $this->Cell(38, 7, utf8_decode("Ixtapaluca,Estado de México a, "), 0, 0, 'C');
    $this->Cell(15, 7, utf8_decode($DateAndTime = date('d-M-Y', Time())), 0, 0, 'C');
    $this->Ln(5);
  }
  function Footer()
  {
    $this->SetY(-15);
   //Arial italic 8

   //Número de página
   $this->Image('imagenes/logopie2023.png' ,8, 260 , 207);
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
  /////////////////////////////////////////////////////////////////////////////
  

}
?>