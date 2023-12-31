<?php
require 'plntilla.php';
require '../clases/conexion.php';
$conexion = new ConexionRh();
$id = $_GET['id'];

$sql = $conexion->prepare("SELECT plantillahraei.Empleado, plantillahraei.id_jefe, plantillahraei.DescripcionPuesto, plantillahraei.DescripcionAdscripcion, plantillahraei.Nombre, intoduccionpuesto.*, jefes2022.nombre as nombrejefe, jefes2022.puesto as puestojefe from plantillahraei inner join jefes2022 on jefes2022.id_jefe = plantillahraei.id_jefe inner join intoduccionpuesto on intoduccionpuesto.id_Empleado = plantillahraei.Empleado  where plantillahraei.Empleado = :Empleado");
    $sql->execute(array(
        ':Empleado'=>$id
    ));
    $data = $sql->fetch();
    $Empleado = $data['Empleado'];
    $id_jefe = $data['id_jefe'];
    $nombre = $data['Nombre'];
    $puesto = $data['DescripcionPuesto'];
    $area = $data['DescripcionAdscripcion'];
    $jefe = $data['nombrejefe'];
    $puestojefe = $data['puestojefe'];
    $fechainicio = date("d-m-Y", strtotime($data['fecha_Inicio']));
    $fechaconclusion = date("d-m-Y", strtotime($data['fecha_conclucion']));
    $entrevistajefe = $data['Entrevistajefe'];
    $lenguaje = $data['lenguajeutilizo'];
    $presentacion = $data['precentacionoficial'];
    $presentacionEmpleado = $data['presentaempleados'];
    $impactoinduccion16 = $data['fueutil'];
    $impactoinduccion17 = $data['retroalimentacion'];
    $impactoinduccion18 = $data['tiempoutilisado'];
    $porque = $data['porque'];
    $comentario = $data['Comentario'];
    $infoorganigrama = $data['infOrganigrama'];
    $funcionesyrespo = $data['funcionesyrespo'];
    $recibioinfo = $data['objetivosypoliticas'];
    $plantrabajoarea = $data['plantrabajo'];
    $normastrabajo = $data['normasarea'];
    $obtuvoinfoprotocolo = $data['protocoloypocedimiento'];
    $recibioinfoactividades = $data['actiextraordinarias'];
    $ubicacionMobiliario = $data['ubicacionmobiliario'];
    $serviciosprincipales = $data['principaleservicios'];
    $solicitudprogrmacion = $data['solicitudyprogramacion'];
    $manifestarondesempenio = $data['desempenorepercute'];
$pdf = new PDF("p", "mm", "LETTER");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->Cell(200, 4, utf8_decode("DATOS DEL TRABAJADOR"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(15, 4, "Nombre:", 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(85, 4, utf8_decode("$nombre"), 1, 0, "C", 1);
$pdf->SetFont("Arial", "B", 9);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(35, 4, utf8_decode("Numero de empleado:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(65, 4, utf8_decode("$Empleado"), 1, 0, "C", 1);

$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, "Puesto:", 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(85, 4, utf8_decode("$puesto"), 1, 0, "C", 1);


$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(35, 4, utf8_decode("Fechas de ingreso:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(65, 4, utf8_decode(""), 1, 0, "l", 1);

$pdf->Ln(5);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("DATOS DEL ÁREA Y/O SERVICIO DE ADSCRIPCIÓN"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(45, 4, utf8_decode("Nombre del área:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(155, 4, utf8_decode("$area"), 1, 0, "l", 1);
$pdf->Ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(45, 4, utf8_decode("Nombre del jefe inmediato:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(155, 4, utf8_decode("$jefe"), 1, 0, "l", 1);

$pdf->Ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(45, 4, utf8_decode("Puesto del jefe inmediato:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(155, 4, utf8_decode("$puestojefe"), 1, 0, "l", 1);

$pdf->Ln(5);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("INDUCCIÓN AL PUESTO"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(30, 5, " FECHA DE INICIO:", 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(60, 5, utf8_decode("$fechainicio"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(43, 5, utf8_decode("FECHA DE CONCLUSIÓN:"), 0, 0, "L", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(67, 5, utf8_decode("$fechaconclusion"), 1, 0, "C", 1);

$pdf->Ln(5);
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("COMPONENTES DE LA INDUCCIÓN"), 0, 0, "C", 1);
$pdf->ln(4.5);
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("ENTREVISTA CON EL JEFE INMEDIATO"), 0, 0, "C", 1);
$pdf->ln(5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 3, utf8_decode("Conceptos:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 3, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 3, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("1.-¿Se llevó a cabo la entrevista con el jefe inmediato de su puesto?"), 1, 0);
if($entrevistajefe == 'Si'){
$pdf->SetFont("Arial", "I", 8);
$pdf->SetTextColor(0, 4, 7);
$pdf->SetFillColor(0, 0, 0);

$pdf->Cell(15, 4, utf8_decode("      x"), 1, 0);
$pdf->SetFillColor(0, 0, 0);

$pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
}else{
    $pdf->SetFont("Arial", "I", 8);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->SetFillColor(0, 0, 0);
    
    $pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
    $pdf->SetFillColor(0, 0, 0);

    $pdf->Cell(15, 4, utf8_decode("      x"), 1, 0); 
}
$pdf->Ln();
$pdf->Cell(170, 4, utf8_decode("2.-¿El lenguaje que se utilizó fue sencillo, claro y cordial?"), 1, 0);
if($lenguaje == 'Si'){
$pdf->SetFont("Arial", "I", 8);
$pdf->SetTextColor(0, 4, 7);
$pdf->SetFillColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("      x"), 1, 0);
$pdf->SetFillColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
}else{
$pdf->SetFont("Arial", "I", 8);
$pdf->SetTextColor(0, 4, 7);
$pdf->SetFillColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
$pdf->SetFillColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("      x"), 1, 0);
}
$pdf->Ln();
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("3.-¿Se llevó a cabo la presentación oficial con sus compañeros de
equipo de trabajo?"), 1, 0, "L", 1);
if($presentacion == 'Si'){
$pdf->SetFont("Arial", "I", 8);
$pdf->SetTextColor(0, 4, 7);
$pdf->SetFillColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("      x"), 1, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
}else{
    $pdf->SetFont("Arial", "I", 8);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->SetFillColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("      x"), 1, 0); 
}
$pdf->Ln();
$pdf->SetFont("Arial", "I",8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("4.-¿Se llevó a cabo la presentación con empleados de otras áreas con
las cuales se relacionará laboralmente?"), 1, 0, "L", 1);
if($presentacionEmpleado == 'Si'){
    $pdf->SetFont("Arial", "I", 8);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->SetFillColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("      x"), 1, 0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
}else{
    $pdf->SetFont("Arial", "I", 8);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->SetFillColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("       "), 1, 0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("      x"), 1, 0); 
}

$pdf->Ln(4.5);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("INFORMACIÓN GENERAL DEL ÁREA Y/O SERVICIO"), 0, 0, "C", 1);
$pdf->ln(4.5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->MultiCell(200, 4, utf8_decode("Instrucciones: Por favor califique objetivamente la información obtenida en cada uno de los aspectos evaluados, de acuerdo con el siguiente criterio. Marque con una 'X' la casilla que corresponda.                         
                    0.-No obtuve ninguna información al respecto             2.-La información fue suficiente
                    1.-La información fue incompleta                                   3.-La informacion fue completa y detallada
"), 1, 1, "L");
$pdf->Ln(2);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("Conceptos:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(7.5, 4, utf8_decode("0"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(7.5, 4, utf8_decode("1"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(7.5, 4, utf8_decode("2"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(7.5, 4, utf8_decode("3"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("5.-Se le proporcionó información del Organigrama,Misión y Visión del
área"), 1, 0, "L", 1);
if($infoorganigrama == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($infoorganigrama == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($infoorganigrama == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($infoorganigrama == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("6.-Se le dió a conocer las funciones y responsabilidades de su cargo
y/o puesto"), 1, 0, "L", 1);
if($funcionesyrespo == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($funcionesyrespo == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($funcionesyrespo == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($funcionesyrespo == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("7.-Recibió información sobre los objetivos y políticas del área"), 1, 0, "L", 1);
if($recibioinfo == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfo == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfo == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfo == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("8.-Se le dió a conocer el plan de trabajo del área"), 1, 0, "L", 1);
if($plantrabajoarea == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($plantrabajoarea == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

}else if($plantrabajoarea == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);

}else if($plantrabajoarea == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);

}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("9.-Se le informó acerca de las normas del área de trabajo"), 1, 0, "L", 1);
if($normastrabajo == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($normastrabajo == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($normastrabajo == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($normastrabajo == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("10.- Obtubo información de protocolos y/o procedimientos del área"), 1, 0, "L", 1);
if($obtuvoinfoprotocolo == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($obtuvoinfoprotocolo == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($obtuvoinfoprotocolo == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($obtuvoinfoprotocolo == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("11.-Recibió información de las actividades extraordinarias"), 1, 0, "L", 1);
if($recibioinfoactividades == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfoactividades == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfoactividades == 2){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($recibioinfoactividades == 3){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->MultiCell(170, 3, utf8_decode("12.- Se le dió a conocer la ubicacion del mobiliario y/o equipo a su resguardo, así como su espacio de trabajo y material que requiere
para el desempeño de sus funciones y el procedimiento que debe seguir para tener acceso a éstos"),1,1);
if($ubicacionMobiliario == 0){
    $pdf->Ln(-6);
$pdf->Cell(170);
$pdf->Cell(7.5, 6, utf8_decode("x"), 1, 0, "C", 0);
$pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
$pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
$pdf->Cell(7.5, 6, utf8_decode(""), 1, 1, "C", 0);
}else if($ubicacionMobiliario == 1){
    $pdf->Ln(-6);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode("x"), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 1, "C", 0);
}else if($ubicacionMobiliario == 2){
    $pdf->Ln(-6);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode("x"), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 1, "C", 0);
}else if($ubicacionMobiliario == 3){
    $pdf->Ln(-6);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode(""), 1, 0, "C", 0);
    $pdf->Cell(7.5, 6, utf8_decode("x"), 1, 1, "C", 0);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->MultiCell(170, 3, utf8_decode("13.-Recibió información acerca la ubicación de los principales servicio del hospital,zonas de seguridad y/o resguardo,comedor, elevadores de personal,el uso de elementos de protección personal(POE, COVID-19,entre otros),así como las rutas de evacuación, etc.
"),1,1);
if($serviciosprincipales == 0){
    $pdf->Ln(-9);
$pdf->Cell(170);
$pdf->Cell(7.5, 9, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 9, utf8_decode(""), 1, 1, "C", 1);
}else if($serviciosprincipales == 1){
    $pdf->Ln(-9);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 1, "C", 1);
}else if($serviciosprincipales == 2){
    $pdf->Ln(-9);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 1, "C", 1);
}else if($serviciosprincipales == 3){
    $pdf->Ln(-9);
    $pdf->Cell(170);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 9, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("14.- Información de solicitud y programación de vacaciones,
incidencias, permisos de capacitación y/o ponencias."), 1, 0, "L", 1);
if($solicitudprogrmacion == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($solicitudprogrmacion == 1){
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($solicitudprogrmacion == 2){
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 1, "C", 1);
}else if($solicitudprogrmacion == 3){
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("15.- Le manifestaron que su desempeño repercutirá en el logro de metas
y prioridades del área a la que pertenece."), 1, 0, "L", 1);
if($manifestarondesempenio == 0){
$pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
$pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
}else if($manifestarondesempenio == 1){
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
    }else if($manifestarondesempenio == 2){
        $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
        $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
        $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
        $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
        }else if($manifestarondesempenio == 3){
            $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
            $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
            $pdf->Cell(7.5, 4, utf8_decode(""), 1, 0, "C", 1);
            $pdf->Cell(7.5, 4, utf8_decode("x"), 1, 0, "C", 1);
            }
$pdf->ln(5);
$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(221 ,201, 163);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(200, 4, utf8_decode("IMPACTO DE LA INDUCCIÓN"), 0, 0, "C", 1);
$pdf->ln(4.5);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 3, utf8_decode("Conceptos:"), 1, 0, "L", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 3, utf8_decode("SI"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 3, utf8_decode("No"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("16.-La información proporcionada, ¿Fue de utilidad para el mejor
desempeño de las funcionesde su puesto?"), 1, 0, "L", 1);
if($impactoinduccion16 == 'Si'){
$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("x"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);
}else{
    $pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("      "), 1, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode("x"), 1, 1, "C", 1);
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("17.-Le dieron retroalimentación para resolver sus dudas"), 1, 0, "L", 1);
if($impactoinduccion17 == 'Si'){
$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("x"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);
}else{
    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(15, 4, utf8_decode(""), 1, 0, "C", 1);
    
    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("x"), 1, 1, "C", 1); 
}
$pdf->SetFont("Arial", "I", 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(170, 4, utf8_decode("18.-¿El tiempo utilizado para la inducción fue adecuado?"), 1, 0, "L", 1);
if($impactoinduccion18 == 'Si'){
$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(15, 4, utf8_decode("x"), 1, 0, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 4, utf8_decode(""), 1, 1, "C", 1);
}else{
    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(15, 4, utf8_decode(""), 1, 0, "C", 1);
    
    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode("x"), 1, 1, "C", 1); 
}
$pdf->Ln(1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 4, utf8_decode("¿POR QUE?"), 1, 1, "L", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(200, 4, utf8_decode("$porque"), 1, 1);

$pdf->Ln(1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(200, 4, utf8_decode("Comentario y/o Sugerencia"), 1, 1, "C", 1);

$pdf->SetFont("Arial", "I", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(200, 6, utf8_decode("$comentario"), 1, 1);
$pdf->Ln(15);

$pdf->Cell(98, -4, utf8_decode("$jefe"), 1, 0, "C", 0);
$pdf->Cell(4, .1, '', 0, 0, "C", 1);
$pdf->Cell(98, -4, utf8_decode("$nombre"), 1, 0, "C", 0);
$pdf->Ln(1);
$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 5, utf8_decode("Nombre y firma de conformidad del jefe inmediato"), 0, 0, "C", 1);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 4, 7);
$pdf->Cell(100, 5, utf8_decode("Nombre y firma del empleado"), 0, 1, "C", 1);

$pdf->Output();

?>