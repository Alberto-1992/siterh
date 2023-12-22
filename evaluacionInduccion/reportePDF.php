<?php
require 'plntilla.php';

$pdf = new PDF("P", "mm", "LETTER");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("INDUCCIÓN AL PUESTO"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(30, 5, " FECHA DE INICIO:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(60, 5, utf8_decode(""), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(43, 5, utf8_decode("FECHA DE CONCLUSIÓN:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(67, 5, utf8_decode(""), 1, 0, "C", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("DATOS DEL TRABAJADOR"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, " Nombre:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(85, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(35, 4, utf8_decode("Numero de empleado:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(65, 4, utf8_decode(""), 1, 0, "C", 1);

$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, "Puesto:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(85, 4, utf8_decode(""), 1, 0, "C", 1);


$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(30, 4, utf8_decode("Fechas de ingreso:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(70, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("DATOS DEL ÁREA Y/O SERVICIO DE ADSCRIPCIÓN"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(35, 4, utf8_decode("Nombre del área:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(165, 4, utf8_decode(""), 1, 0, "l", 1);
$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(45, 4, utf8_decode("Nombre del jefe inmediato:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(155, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(45, 4, utf8_decode("Puesto del jefe inmediato:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(155, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(6);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("COMPONENTES DE LA INDUCCIÓN"), 0, 0, "C", 1);
$pdf->ln(4.5);
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("ENTREVISTA CON EL JEFE INMEDIATO"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 4, utf8_decode("Instrucciones: Realise el llenado y marque con una 'X'"), 0, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(20, 4, utf8_decode("Comseptos:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 4, utf8_decode(""), 0, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("1.-¿Se llevó a cabo la entrevista con el jefe inmediato de su puesto?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("2.-¿El lenguaje que se utilizó fue sencillo, claro y cordial?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("3.-¿Se llevó a cabo la presentación oficial con sus compañeros de
equipo de trabajo?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("4.-¿Se llevó a cabo la presentación con empleados de otras áreas con
las cuales se relacionará laboralmente?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 0, "C", 1);

$pdf->Ln(4.5);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("INFORMACIÓN GENERAL DEL ÁREA Y/O SERVICIO"), 0, 0, "C", 1);
$pdf->ln(4.5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->MultiCell(200, 4, utf8_decode("Instrucciones: Por favor califique objetivamente la información obtenida en cada uno de los aspectos evaluados, de acuerdo con el siguiente criterio. Marque con una 'X'  casilla que corresponda                         
                    0.-No obtuve ninguna información al respecto             2.-La información fue suficiente
                    1.-La información fue incompleta                                   3.-La informacion fue completa y detallada
"), 0, 1, "L");
$pdf->Ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("Comseptos:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(7.5, 4, utf8_decode("0"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(7.5, 4, utf8_decode("1"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(7.5, 4, utf8_decode("2"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(7.5, 4, utf8_decode("3"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("5.-Se le proporcionó información del Organigrama,Misión y Visión del
área"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("6.-Se le dió a conocer las funciones y responsabilidades de su cargo
y/o puesto"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("7.-Recibió información sobre los objetivos y políticas del área"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("8.-Se le dió a conocer el plan de trabajo del área"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("9.-Se le informó acerca de las normas del área de trabajo"), 0, 0, "L", 1);


$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("10.- Obtubo información de protocolos y/o procedimientos del área"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
//
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("11.-Recibió información de las actividades extraordinarias"), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
//
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Write(3, utf8_decode("12.- Se le dió a conocer la ubicacion del mobiliario y/o equipo a su resguardo, así como su espacio de trabajo y material que 
requiere para el desempeño de sus funciones y el procedimiento que debe seguir para para tener acceso a éstos") );
$pdf->Cell(18.5);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 1, "C", 1);
//3
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Write($h=3, utf8_decode("13.-Recibió información acerca la ubicación de los principales servicio del hospital,zonas de seguridad y/o resguardo,comedor, elevadores de personal,el uso de elementos de protección personal(POE, COVID-19,entre otros),así como las rutas de evacuación, etc."));
$pdf->Cell(8.5);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 5, utf8_decode(""), 1, 1, "C", 1);
//4
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("14.- Información de solicitud y programación de vacaciones,
incidencias, permisos de capacitación y/o ponencias."), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
//5
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("15.- Le manifestaron que su desempeño repercutirá en el logro de metas
y prioridades del área a la que pertenece."), 0, 0, "L", 1);

$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221, 221, 221);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("IMPACTO DE LA INDUCCIÓN"), 0, 0, "C", 1);
$pdf->ln(4.5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(20, 4, utf8_decode("Comseptos:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 4, utf8_decode(""), 0, 0, "l", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("16.-La información proporcionada, ¿Fue de utilidad para el mejor
desempeño de las funcionesde su puesto?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("17.-Le dieron retroalimentación para resolver sus dudas"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("18.-¿El tiempo utilizado para la inducción fue adecuado?"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode(""), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->Ln(1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 4, utf8_decode("¿POR QUE"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode(""), 1, 1, "C", 1);

$pdf->Ln(1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 4, utf8_decode("Comentario y/o Sugerencia"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(200, 4, utf8_decode(""), 1, 1, "C");

$pdf->Output();

?>