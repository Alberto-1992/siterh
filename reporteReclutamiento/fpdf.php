<?php

require 'generarCedulaReclutamiento.php';
require '../clases/conexion.php';
$id = $_GET['id'];
$conexion = new ConexionDocumentacion();
$sql = $conexion->prepare("SELECT datospersonales.*, estudiossuperior.*, estuidosmaestria.*, estudiosmediosup.*, especialidad.*, explaboralprivado.*, explaboralpublico.*, actualizacionacademica.* from datospersonales 
left outer join estudiosmediosup on estudiosmediosup.id_postulado = datospersonales.id_datopersonal
left outer join estudiossuperior on estudiossuperior.id_empleado = datospersonales.id_datopersonal
left outer join estudiosmaestria on estudiosmaestria.id_empleado = datospersonales.id_datopersonal 
left outer join especialidad on especialidad.id_empleado = datospersonales.id_datopersonal
left outer join explaboralprivado on explaboralprivado.id_postulado = datospersonales.id_datopersonal
left outer join explaboralpublico on explaboralpublico.id_postulado = datospersonales.id_datopersonal
left outer join actualizacionacademica on actualizacionacademica.id_postulado = datospersonales.id_datopersonal
where datospersonales.curp = :curp");
    $sql->execute(array(
        ':curp'=>$id
    ));

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $id_postulado = $row['id_postulado'];
    $sql_m = $conexion->prepare("SELECT SUM( IF(nombrecursouno != '-', 1,0) + IF(nombrecursodos != '-', 1,0) + IF(nombrecursotres != '-', 1,0)) total FROM actualizacionacademica where id_postulado = :id_postulado");
        $sql_m->execute(array(
            ':id_postulado'=>$id_postulado
        ));
    $rows = $sql_m->fetch();
    $valida = $rows['total'];
    if($valida == 1 or $valida == 2 or $valida == 3){
        $punto = '1 punto';
    }else if($valida >= 4){
        $punto = '2 puntos';
    }else if($valida == 0){
        $punto = '0 puntos';
    }
    $codigopuesto = $row['plazaevaluar'];
$conexionP = new Conexion();
    $sql_p = $conexionP->prepare("SELECT * from descripcionpuestos where codigopuesto = :codigopuesto");
        $sql_p->execute(array(
            ':codigopuesto'=>$codigopuesto
        ));
    $rowCodigo = $sql_p->fetch(PDO::FETCH_ASSOC);
    $pdf = new PDF("P", "mm", "A4"); //Orientacion,Unidad de mediada en (mm,cm,p),tipo,
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "BI", 15);
    $pdf->SetFillColor( 248, 133, 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 7, " DICTAMEN Y REPORTYE INTEGRAL", 0, 0, "C", 1);
    $pdf->ln(8);


    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(248, 133, 11);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, utf8_decode("FECHA DE LA EVALUACIÓN :"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["nombre"], 0, 0, "L", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(248, 133, 11);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " FOLIO:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["nombre"], 0, 0, "L", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 15);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 7, utf8_decode(" I. PROCEDIMIENTO DE EVALUACIÓN"), 0, 0, "C", 1);
    $pdf->ln(8);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(20, 4, utf8_decode("PUESTO:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(90, 4, utf8_decode($rowCodigo["puesto"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(20, 4, " CODIGO:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($rowCodigo["codigopuesto"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(255, 165, 69);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(20, 4, utf8_decode("SUELDO B:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(15, 4, utf8_decode($rowCodigo["sueldo"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode(" A) REQUISITOS ACADÉMICOS"), 0, 0, "L", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "B", 8);
    $pdf->SetFillColor( 255,255,255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($rowCodigo['requisitos']), 1, 1, "L");
    $pdf->ln(2);

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode(" B) REQUISITOS DE EXPERIENCIA"), 0, 0, "L", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "B", 8);
    $pdf->SetFillColor( 255,255,255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($rowCodigo['experiencia']  ), 1, 1, "L");
    $pdf->ln(2);

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 255, 165, 69);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode(" C) FUNCIONES"), 0, 0, "L", 1);
    $pdf->ln(6);

    //Inicia datos perosnales
    $pdf->SetFont("Arial", "B", 8);
    $pdf->SetFillColor( 255,255,255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode(""), 1, 1, "L");
    $pdf->ln(2);
    $pdf->SetFont("Arial", "BI", 15);
    $pdf->SetFillColor(111, 192, 249);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 7, " Datos del candidato", 0, 0, "C", 1);
    $pdf->ln(8);
    //---------------------------------------------------------------------------------------------------//

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250); //es para darle colores  en formato RGB
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 5, " Nombre:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(90, 5, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    //--------------------------------------------------------------------------------------------------------//
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 5, "CURP :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 5, utf8_decode($row["curp"]), 0, 0, "l", 1);

    $pdf->Ln();

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 5, " RFC:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(90, 5, utf8_decode($row["rfc"]), 0, 0, "l", 1);
    //------------------------------------------------------------------//
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 5, " Sexo:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(20, 5, utf8_decode($row["sexo"]), 0, 0, "l", 1);
    $pdf->ln(5);
    //-------------Formacion academica----------------------------------------------//
    $pdf->SetFont("Arial", "BI", 15);
    $pdf->SetFillColor(111, 192, 249);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 7, utf8_decode(" Formación Académica"), 0, 0, "C", 1);
    $pdf->ln();
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Nivel Media Superior"), 0, 0, "C", 1);
    $pdf->ln(5);
    //----------------------------------------------------------------------//
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombreformacionmedia"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombremediasuperior"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechainicio"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechatermino"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30,4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["tiempocursado"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65,4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30,4, utf8_decode($row["documentomediosuperior"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    //-------------------------Superior---------------------------------------------------------------------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Nivel Superior"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombreformacionsuperior"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombresuperior"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechasuperiorinicio"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechasuperiortermino"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["tiempocursadosuperior"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65, 4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["documentosuperior"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("N° de Cédula:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["numerocedulasuperior"]), 0, 0, "l", 1);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    $pdf->Ln(5);

    //-------------Nivel Maestria-----------------------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Nivel Maestría"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombreformacionmaestria"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombremaestria"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechainiciomaestria"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechaterminomaestria"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["tiempocursadomaestria"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65, 4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["documentomaestria"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("N° de Cédula:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["cedulamaestria"]), 0, 0, "l", 1);   
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    //---------------------Posgrado --------------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Nivel Posgrado / Especialidad"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombreformacionposgrado"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombreposgrado"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Unidad Hospitalaria:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["unidadhospitalaria"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechaposgradoinicio"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechaposgradotermino"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["tiempocursadoposgrado"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65, 4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["documentorecibeposgrado"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("N° de Cédula:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["numerocedulaposgrado"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    //-------------- SubEspecialidad -------------------//
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Nivel Doctorado/SubEspecialidad"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombreformaciondoctorado"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombredoctorado"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Unidad Hospitalaria:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["unidadhospitalariadoctorado"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechainiciodoctorado"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["fechaterminodoctorado"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["tiempocursadodoctorado"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65, 4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["documentorecibedoctorado"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("N° de Cédula:"), 0, 0, "C", 1);
    $pdf->SetFont("Arial", "I",9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["numeroceduladoctorado"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    //------------------Alta------------------------//
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(181, 182, 182);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode(" Alta Especialidad"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la formación academica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre de la Institución Académica:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60,4,utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Unidad Hospitalaria:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4,utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(50, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(50, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("Años Cursados:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(65, 4, " Documento aval de nivel de Estudios:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(30, 4, utf8_decode("N° de Cédula:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(85, 4, utf8_decode(" Puntuación Obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    $pdf->Ln(5);
    //------------------Cursos----------------//
    //$pdf->AddPage();
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(174, 177, 179);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 7, utf8_decode(" Cursos de actualización y/o Especialización relacionados con la función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(8);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(217, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("De 1 a 3 cursos:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, "1 punto", 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(217, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("4 o más cursos y/o diplomas:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, "2 punto", 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(217, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Puntuación obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, $punto, 0, 0, "l", 1);

    $pdf->Ln(5);
    //-------------1--------------/-///

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(53, 114, 202);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Cursos de actualizacion y/o especializacion relacionados con las función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrecursouno"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Institución sede:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["institucioncursouno"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechainiciocursouno"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechaterminocursouno"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(45, 4, utf8_decode("Duración total (meses):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Documento aval del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["documentorecibecursouno"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    //---------------2--------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(53, 114, 202);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Cursos de actualizacion y/o especializacion relacionados con las función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrecursodos"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Institución sede:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["institucioncursodos"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechainiciocursodos"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechaterminocursodos"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(45, 4, utf8_decode("Duración total (meses):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Documento aval del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["documentorecibecursodos"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    //---------------3--------------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(53, 114, 202);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Cursos de actualizacion y/o especializacion relacionados con las función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrecursotres"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Institución sede:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["institucioncursotres"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI",9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechainiciocursotres"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["fechaterminocursotres"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(45, 4, utf8_decode("Duración total (meses):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 9);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Documento aval del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["documentorecibecursotres"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    //---------4----------------//
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(53, 114, 202);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Cursos de actualizacion y/o especializacion relacionados con las función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Institución sede:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(45, 4, utf8_decode("Duración total (meses):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Documento aval del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    //-------------5------------------//
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(53, 114, 202);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Cursos de actualizacion y/o especializacion relacionados con las función a desempeñar"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Nombre del cuerso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Institución sede:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, "Fecha inicio :", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(25, 4, " Fecha termino:", 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(45, 4, utf8_decode("Duración total (meses):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 4, $row["nombre"], 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(195, 227, 250);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(61, 4, utf8_decode("Documento aval del curso:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->AddPage();
    $pdf->Ln(5);
    //-------------// 
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor(168, 170, 168);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Méritos o reconocimientos académicos"), 0, 0, "C", 1);
    $pdf->ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del reconocimiento,mérito académico:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre de la institución académica que expide:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Puntuación obtenida:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);
    
    $pdf->Ln(6);

    //-------------Experiencia------------//
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Experiencia laboral"), 0, 0, "C", 1);
    $pdf->ln(6);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor(  168, 170, 168);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 5, utf8_decode("Revisar los críterios que se encuentran en cada apartado para seleccionar el puntaje obtenido"), 0, 0, "C", 1);
    $pdf->ln(6);
    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector público"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["empresauno"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["puestoempresauno"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainiciouno"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["cbx_dependenciauno"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminouno"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionespricipalesuno"]), 1, 1, "l", 1);

    $pdf->Ln(5);

    //-------------2--------------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector público"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["empresados"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["puestoempresados"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainicidos"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["cbx_dependenciados"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminodos"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionespricipalesdos"]), 1, 1, "l", 1);

    $pdf->Ln(6);

    //------------3----------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector público"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["empresatres"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["tipopuestotres"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainiciotres"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["cbx_dependenciatres"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de laborales:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminotres"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionespricipalestres"]), 1, 1, "l", 1);

    $pdf->Ln(6);

    //------------privado----------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector privado"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrelaboralprivada"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["tipopuestoprivada"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de labores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainicioprivada"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de labores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminoprivada"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionesprivada"]), 1, 1, "l", 1);

    $pdf->Ln(6);

    //-------------2---------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector privado"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrelaboralprivadados"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["tipopuestoprivadados"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de lavores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainicioprivadados"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de labores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminoprivadados"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionesprivadados"]), 1, 1, "l", 1);

    $pdf->Ln(6);

    //--------------3----------//

    $pdf->SetFont("Arial", "BI", 12);
    $pdf->SetFillColor( 12, 183, 20 );
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(200, 4, utf8_decode("Experiencia laboral sector privado"), 0, 0, "C", 1);
    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre  de la institución:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["nombrelaboralprivadatres"]), 0, 0, "l", 1);
    
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(82, 4, utf8_decode("Nombre del puesto:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(60, 4, utf8_decode($row["tipopuestoprivadatres"]), 0, 0, "l", 1);

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de Inicio de labores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechainicioprivadatres"]), 0, 0, "l", 1);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Sector:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->Ln(6);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Fecha de conclusión de labores:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["fechaterminoprivadatres"]), 0, 0, "l", 1);
    

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Duración total (años):"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(70, 4, utf8_decode("Documento aval de trayectoria laboral:"), 0, 0, "C", 1);

    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(100, 4, utf8_decode($row["nombre"]), 0, 0, "l", 1);

    $pdf->ln(5);

    $pdf->SetFont("Arial", "BI", 10);
    $pdf->SetFillColor( 218, 218, 218);
    $pdf->SetTextColor(0, 4, 7);
    $pdf->Cell(200, 4, utf8_decode("Principales Funciones:"), 0, 0, "C", 1);
    $pdf->Ln(5);
    $pdf->SetFont("Arial", "I", 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(200, 5, utf8_decode($row["funcionesprivadatres"]), 1, 1, "l", 1);

    $pdf->Ln(6);

    //$pdf->SetFont("Arial", "I", 10); //Das diselo al recuadro, dependiendo donde lo pociciones 
    //$pdf->SetTextColor(0, 0, 0);
    }
    
//$pdf->Cell(50, 10, "Reporte PHP", 1, 1, "C"); //la SElda contine un ancho,una altura, el relleno ,contorno,salto de linea y alineacion 
//$pdf->MultiCell(50, 10, "Reporte PHP", 1, "C");
    $pdf->Output("pdf", 'I'); //muestras el pdf
    
    
?>