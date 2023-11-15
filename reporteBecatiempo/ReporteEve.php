<?php
require 'reporteBecatiempo/plntilla.php';
require_once 'clases/conexion.php';
                            $conexionX = new ConexionRh();
                            if (isset($_SESSION['usuarioJefe'])) {
                                $idjefe = $rw['id_jefedeljefe'];

                                $sql = $conexionX->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                                $sql->execute(array(
                                    ':id_jefe' => $idjefe
                                ));
                                $rowj = $sql->fetch();
                            } else if (isset($_SESSION['usuarioDatos'])) {
                                $idjefe = $rw['id_jefe'];
                                $sql = $conexionX->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                                $sql->execute(array(
                                    ':id_jefe' => $idjefe
                                ));
                                $rowj = $sql->fetch();
                            } 
$pdf = new PDF("P", "mm", "LETTER");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->ln(5);
$pdf->Cell(200, 4, utf8_decode("DATOS PERSONALES (Es indispensable requisitar todos los rubros) "), 0, 0, "C", 1);
$pdf->ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(31, 5, " Nombre completo:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(89, 4, utf8_decode($rw['Nombre']), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(30, 5, utf8_decode(" N° de empleado:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(50, 4, utf8_decode($rw['Empleado']), 1, 0, "C", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(32, 4, " Nombre del puesto:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(88, 4, utf8_decode($rw['DescripcionPuesto']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("Código :"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 4, utf8_decode($rw['CodigoPuesto']), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, "Fecha ingreso :", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 4, utf8_decode($rw['Empleado']), 1, 0, "C", 1);
$pdf->Ln(6);
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(28, 4, utf8_decode("Nombre del área:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(171, 4, utf8_decode($rw['DescripcionAdscripcion']), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, utf8_decode("Especialidad:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(175, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(6);
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(15, 4, utf8_decode("Servicio:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(184, 4, utf8_decode($rw['DescripcionAdscripcion']), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(12, 4, utf8_decode("Turno:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, utf8_decode("Días laborales:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(60, 4, utf8_decode("Sabados, Domingos y dias festivos"), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(12, 4, utf8_decode("Curso:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("Correo:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40, 4, utf8_decode($rw['correo']), 1, 0, "l", 1);

$pdf->Ln(6);
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(17, 4, utf8_decode("Telefono:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(87, 4, utf8_decode($rw['telefonocelular']), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(10, 4, utf8_decode("Base:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(18, 4, utf8_decode("Confianza:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(22, 4, utf8_decode("Provisional:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(43, 5, " Nombre del jefe inmediato:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(156, 4, utf8_decode($rowj['nombre']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);
$pdf->Ln(6);
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(2);
$pdf->Cell(42, 5, "Cargo de jefe inmediato:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(156, 4, utf8_decode($rowj['puesto']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);
$pdf->Ln(10);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("DATOS ESPECÍFICOS DEl EVENTO ACADÉMICO (Es indispensable requisitar todos los rubros) "), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(50, 5, utf8_decode(" Nombre del evento académico:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 4, utf8_decode($rw['Nombre_evento']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(57, 5, utf8_decode("Modalidad y actividad que realizará:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(142, 4, utf8_decode($rw['modalidad_actividades']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);
$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(42, 5, utf8_decode("Lugar donde se impartirá:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(157, 4, utf8_decode($rw['lugar_dondeimpar']), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);
$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(21, 4, "Fecha inicio:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(22, 4,utf8_decode($rw['fecha_inicia']), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, " Fecha termino:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(22, 4, utf8_decode($rw['fecha_termino']), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(64, 4, " Horario Establicido para dicha actividad:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(45, 4, utf8_decode($rw['horario_establecido']), 1, 0, "C", 1);

$pdf->Ln(10);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(57, 5, utf8_decode("Describa brevemente su solicitud:"), 0, 0, "L", 1);
$pdf->Ln(6);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(200, 5, utf8_decode($rw['descripcionevento']), 1, 0, "C", );

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(1);
$pdf->Cell(57, 5, utf8_decode("Comentario del jefe inmediato de contribución al servicio de la capacitación solicitada :"), 0, 0, "L", 1);
$pdf->Ln(6);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(200, 5, utf8_decode($rw['comentariojefe']), 1, 0, "C", );

$pdf->Ln(6);


$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 4, "Nombre y firma del interesado ", 0, 0, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 4,utf8_decode("Nombre y firma de autorización del jefe inmediato"), 100, 0, "C", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 20, utf8_decode($rw['Nombre']), 1, 0, "C", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 20, utf8_decode($rowj['nombre']), 1, 0, "C", 1);

$pdf->Ln(25);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 4, utf8_decode("Fecha de recepción "), 0, 0, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 4,utf8_decode("Firma de quien recibe el formato"), 100, 0, "C", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 20, utf8_decode(""), 1, 0, "C", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 20, utf8_decode(""), 1, 0, "C", 1);

$pdf->Output();

?>