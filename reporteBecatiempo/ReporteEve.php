<?php
require 'reporteBecatiempo/plntilla.php';

                            if (isset($_SESSION['usuarioJefe'])) {
                                $idjefe = $rw['id_jefedeljefe'];

                                $sql = $conexion->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                                $sql->execute(array(
                                    ':id_jefe' => $idjefe
                                ));
                                $rowj = $sql->fetch();
                            } else if (isset($_SESSION['usuarioDatos'])) {
                                $idjefe = $rw['id_jefe'];
                                $sql = $conexion->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                                $sql->execute(array(
                                    ':id_jefe' => $idjefe
                                ));
                                $rowj = $sql->fetch();
                            } 
$pdf = new PDF("P", "mm", "LETTER");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(25);
$pdf->Cell(200, 180,  "", 1);
$pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(83, 25);
    $pdf->MultiCell(50, 3, utf8_decode("PERMISO ADMINISTRATIVO (beca tiempo menor a 30 dias)"), 0, "C");
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Text(20, 100, $pdf->MultiCell(55, 3, utf8_decode("MTRO. HUGO FRANCISCO ROSAS CUEVAS.
SUBDIRECTOR DE RECURSOS HUMANOS
PRESENTE"), 0, 1));
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$fechagenero = date("d/m/Y", strtotime($rw['fechagenerosolicitud']));
$pdf->Cell(340, 0, utf8_decode("Ixtapaluca,Estado de México a, ".' '.$fechagenero), 0, 0, 'C');
$pdf->SetFont("Arial", "", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(2);
$pdf->Cell(200, 4, utf8_decode("Solicito a usted de la manera más atenta, otorgar las facilidades para asistir al evento académico que se describe:"), 0, 0, "L", 0);
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
$fechaingreso = date("d/m/Y", strtotime($rw['fechaingreso']));
$pdf->Cell(20, 4, utf8_decode($fechaingreso), 1, 0, "C", 1);
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
$pdf->Cell(22, 4, utf8_decode($rw['Turno']), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, utf8_decode("Días laborales:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(58, 4, utf8_decode($rw['Jornada']), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(12, 4, utf8_decode("Curso:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode($rw['tipoCursoIntExt']), 1, 0, "l", 1);

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
$pdf->Cell(100, 4, utf8_decode($rw['telefonocelular']), 1, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(10, 4, utf8_decode("Base:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

if($rw['EstatusPlaza'] == 'B'){
$pdf->Cell(15, 4, utf8_decode("    X"), 0, 0, "l", 1);   
}
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(18, 4, utf8_decode("Confianza:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
if($rw['EstatusPlaza'] == 'CF'){
    $pdf->Cell(15, 4, utf8_decode("    X"), 0, 0, "l", 1);   
    }
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(22, 4, utf8_decode("Provisional:"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
if($rw['EstatusPlaza'] == 'PR'){
$pdf->Cell(15, 4, utf8_decode("    X"), 0, 0, "l", 1);
}
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
$pdf->Cell(142, 4, utf8_decode(strtoupper($rw['modalidad_actividades'])), 1, 0, "C", 1);
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
$newDate = date("d/m/Y", strtotime($rw['fecha_inicia']));
$pdf->Cell(22, 4,utf8_decode($newDate), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(25, 4, " Fecha termino:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$newDate2 = date("d/m/Y", strtotime($rw['fecha_termino']));
$pdf->Cell(22, 4, utf8_decode($newDate2), 1, 0, "C", 1);

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
$pdf->MultiCell(200, 5, utf8_decode($rw['descripcionevento']), 1, 1, "L", 1);

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
$pdf->MultiCell(200, 5, utf8_decode($rw['comentariojefe']), 1, 1, "L", );

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

$pdf->SetFont("Arial", "", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 20, utf8_decode(""), 1, 0, "C", 1);
$pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(83, 25);
    $pdf->MultiCell(50, 3, utf8_decode("PERMISO ADMINISTRATIVO (beca tiempo menor a 30 dias)"), 0, "C");
$pdf->ln(5);
$pdf->SetFont("Arial", "B", 8);
$pdf->Cell(200, 4, utf8_decode("INSTRUCTIVO DE LLENADO "), 0, 0, "C", 1);
$pdf->SetFont("Arial", "", 8);
$pdf->Ln(5);

$pdf->MultiCell(200, 4, utf8_decode("1. Llenar toda la cédula con letra de molde.
2.  Escribir el día y el mes en que realiza la solicitud.
3.  Colocar todos sus DATOS PERSONALES sin abreviaturas y sin omitir ningún dato.
4.  Colocar todos los DATOS ESPECÍFICOS DEL EVENTO ACADÉMICO sin abreviaturas y sin omitir ningún dato.
5.  Escriba el nombre completo del evento académico.
6.  Describa la modalidad y actividad que realizará.
Ejemplo: Ponente en congreso, invitado como docente, asistente como congresista, invitado como ponente en representación del HRAE Ixtapaluca.
7.  Escribir el nombre completo del lugar en donde se llevará a cabo el evento académico.
8.  Colocar la fecha de inicio y fecha de término del evento académico.
9.  Referir el horario en que se llevará a cabo el evento académico.
10. Colocar el nombre del documento que anexa a la petición.
Ejemplo. Ficha de inscripción, tríptico, programa y, en su caso, oficio de invitación.
11. Describa brevemente su solicitud.
Ej. Solicito los Días… solicito las horas de los días… solicito las veladas de los días.
12. Su jefe inmediato debe realizar un comentario de manera escrita, referente a la contribución que hará al servicio en el cual se encuentra adscrito.
13. Escribir el nombre completo y la firma del jefe inmediato.
14. Escribir el nombre completo y la firma del solicitante.
15. En el caso de que el evento donde se participe sea de carácter presencial fuera de la institución y de haberse decretado y/o existir alguna emergencia sanitaria, se deberá presentar un documento donde se indique si la institución y/o dependencia a la que acudirá cuenta con los protocolos de limpieza, desinfección, toma de temperatura y espacios sanitarios que resguarden la seguridad higiénica del personal que asista.
    NOTAS:
    *La entrega de este formato debe realizarse con 10 días naturales de anticipación al evento académico, a la Subdirección de Recursos Humanos.
            En los casos donde se reciba una solicitud de manera extemporánea, este se autorizará siempre y cuando sea de suma importancia para el área o 
            servicio en donde desempeña sus funciones, además de que deberá tener el visto bueno del director del área.
    *Al presente formato debe anexar, ficha de inscripción tríptico, programa y, en su caso, oficio de invitación.
    *Si el evento se realizará en el extranjero, adicionalmente a la documentación anteriormente solicitada deberá anexar copia de la solicitud y la aprobación 
     de visto bueno del Secretario de Salud, de lo contrario no procederá su solicitud.
    *Si un evento académico es requerido por más de una persona de la misma área, el jefe inmediato deberá describir en el formato de solicitud la no 
     afectación en la continuidad del servicio en la calidad y atención de los usuarios.
    *La entrega de la presente solicitud no es compromiso de autorización final.
    *El seguimiento del trámite, es responsabilidad del solicitante.
    *La persona servidora pública quedará obligada a entregar ante la Subdirección de Recursos Humanos copia del documento comprobatorio o constancia 
     de asistencia dentro de los 10 días naturales posteriores a la fecha de término del evento y presentar el documento original para su cotejo.
    *Respecto a los eventos en el extranjero además de la constancia, deberán entregar copia del informe que contenga las actividades realizadas y objetivos 
     logrados en beneficio al desempeño de sus funciones.
    *En caso de cancelación del evento, el trabajador deberá notificar oportunamente mediante oficio a la Subdirección de Recursos Humanos, con la finalidad 
     de no verse afectado en sus percepciones.
    *De no entregar copia del documento comprobatorio de asistencia (constancia), se pone de manifiesto que usted no asistió al evento académico y la 
     justificación de la beca tiempo se dará por cancelada, por lo que se procederá a la aplicación del descuento correspondiente vía nómina y los días 
     solicitados serán considerados como faltas injustificadas.
    *En el supuesto, de que al término del evento no reciba comprobante de su asistencia al evento, imposibilitándolo a realizar la entrega en el tiempo 
     requerido, deberá notificar por escrito (Oficio dirigido al Subdirector de Recursos Humanos) el motivo por el cual no recibió dicho documento, así mismo, 
     deberá especificar el compromiso de su entrega una vez obtenido el documento original.
    *Adicionalmente para el caso del personal adscrito a la Dirección médica, deberá contar en su expediente personal con las acreditaciones certificaciones 
     asociadas a su especialidad vigentes o evidencia que se encuentra en trámite vigentes, como le es requerido en la Ley General de Salud e informar con 
     tiempo a la Unidad de Consulta Externa t Teleconsulta el periodo autorizado para cierre de la agenda, (personal que cuenta con agenda para consultas).
    *Una vez que se le notifique que ya se cuenta con la respuesta a su solicitud, tendrá un plazo no mayor a 5 días naturales contados a partir del día 
     siguiente de la fecha de la notificación para recogerla; por lo que en caso de que la respuesta a su solicitud haya sido favorable y ésta no sea recogida en 
     el tiempo anteriormente citado quedara cancelada."), 0, 1, "L" );

$pdf->Ln(6);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 10, utf8_decode($rw['Nombre']), 0, 0, "C", 1);
$pdf->Ln(7);
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(65);
$pdf->Cell(70, .1, "", 1, 0, "C", 1);
$pdf->Ln(1);
$pdf->Cell(200, 4, "Nombre y Firma de enterado ", 0, 0, "C", 1);
$pdf->Ln(4);
$pdf->Cell(200, 4, "Solicitante ", 0, 0, "C", 1);
$pdf->Output();

?>