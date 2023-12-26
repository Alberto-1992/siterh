<?php session_start();
error_reporting(0);
require '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);
$valor = '';
if($organizacionales != ''){
    $valor = $organizacionales;
}else if($directivas != ''){
    $valor = $directivas;
}else if($competencias != ''){
    $valor = $competencias;
}else if($tecnicas != ''){
    $valor = $tecnicas;
}else if($tecnicasmando != ''){
    $valor = $tecnicasmando;
}else if($tecnicasmuec != ''){
    $valor = $tecnicasmuec;
}else if($competenciasintegrativas){
    $valor = $competenciasintegrativas;
}else if($competenciasespecializadas != ''){
    $valor = $competenciasespecializadas;
}
if($tienecosto == ''){
    $cuentacosto = 'No';
}else {
    $cuentacosto = $tienecosto;
}
if($CostoCurso == ''){
    $costodelcurso = 0;
}else{
    $costodelcurso = $CostoCurso;
}
if($programaPropuesto == ''){
    $programapresupuestal = 'Ninguno';
}else {
    $programapresupuestal = $programaPropuesto;
}
$f_inicio          = $_POST['Fechainicio'];
$Fechainicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_POST['Fechatermino']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$Fechatermino         = date('Y-m-d', ($fecha_fin1));
if ($_FILES["imagenCurso"]["error"] > 0) {

} else {
    
    $admitidos = array("image/jpg","image/jpeg","image/png");
    $valorRand = rand();

    if (array($_FILES["imagenCurso"]["type"], $admitidos) && $_FILES["imagenCurso"]["size"]) {

        $ruta = '../imagenesCursos/'.$Nombrecurso.$Fechainicio.'/';
        $archivo = $ruta . $_FILES["imagenCurso"]["name"] = $Nombrecurso.'.jpg';


        if (!file_exists($ruta)) {
            mkdir($ruta);
        }

        if (file_exists($archivo)) {
            $resultado = @move_uploaded_file($_FILES["imagenCurso"]["tmp_name"], $archivo);

            /*if ($resultado) {
                echo "<script>alert('Foto actualizada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }*/
        } elseif (!file_exists($archivo)) {
        
            $resultado = @move_uploaded_file($_FILES["imagenCurso"]["tmp_name"], $archivo);

            /*if ($resultado) {
                echo "<script>alert('Foto cargada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }*/
        }
    }
    
}
if ($_FILES["fichacurso"]["error"] > 0) {

} else {
    
    $admitidos = array("image/jpg","image/jpeg","image/png");
    $valorRand = rand();

    if (array($_FILES["fichacurso"]["type"], $admitidos) && $_FILES["fichacurso"]["size"]) {

        $ruta = '../fichasCursos/'.$Nombrecurso.$Fechainicio.'/';
        $archivo = $ruta . $_FILES["fichacurso"]["name"] = $Nombrecurso.'.pdf';


        if (!file_exists($ruta)) {
            mkdir($ruta);
        }

        if (file_exists($archivo)) {
            $resultado = @move_uploaded_file($_FILES["fichacurso"]["tmp_name"], $archivo);

            /*if ($resultado) {
                echo "<script>alert('Foto actualizada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }*/
        } elseif (!file_exists($archivo)) {
        
            $resultado = @move_uploaded_file($_FILES["fichacurso"]["tmp_name"], $archivo);

            /*if ($resultado) {
                echo "<script>alert('Foto cargada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }*/
        }
    }
    
}
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $rutaGuardar = 'imagenesCursos/'.$Nombrecurso.$Fechainicio.'/'.$Nombrecurso.'.jpg';
    $rutaArchivo = 'fichasCursos/'.$Nombrecurso.$Fechainicio.'/'.$Nombrecurso.'.pdf';
    $sql = $conexionX->prepare("INSERT INTO nombre_capacitacion (nombre_capacitacion, nombre_del_instructor, lugar_imparte, tema_capacitacion, objetivo, num_participantes, tienecosto, coasto, duracion_cuerso, 
    programa, lineaestratejica, id_areacordinacion, id_provedor, programapropuesto, tipode_accion, arefortalese, id_tipopersonal, modalidad, fecha_inicio, fecha_termino, competencia, rutaimagen, link) 
    VALUES (:nombre_capacitacion, :nombre_del_instructor, :lugar_imparte, :tema_capacitacion, :objetivo, :num_participantes, :tienecosto, :coasto, :duracion_cuerso, :programa, :lineaestratejica, :id_areacordinacion, :id_provedor, 
    :programapropuesto, :tipode_accion, :arefortalese, :id_tipopersonal, :modalidad, :fecha_inicio, :fecha_termino, :competencia, :rutaimagen, :link)");
    $sql->execute(
        array(

            ':nombre_capacitacion' => $Nombrecurso,
            ':nombre_del_instructor' => $instructor,
            ':lugar_imparte' => $LugarImparte,
            ':tema_capacitacion' => $Temariocapacitacion,
            ':objetivo'=>$rutaArchivo,
            ':num_participantes' => $asistentes,
            ':tienecosto'=>$cuentacosto,
            ':coasto' => $costodelcurso,
            ':duracion_cuerso' => $Duracion,
            ':programa' => $programa,
            ':lineaestratejica' => $LineaEstratejica,
            ':id_areacordinacion'=>$AreaCordina,
            ':id_provedor'=>$Provedor,
            ':programapropuesto' =>$programapresupuestal,
            ':tipode_accion'=>$tipoaccion,
            ':arefortalese'=>$areaquefortalese,
            ':id_tipopersonal'=>$personal,
            ':modalidad'=>$Modalidad,
            ':fecha_inicio' =>$Fechainicio,
            ':fecha_termino'=>$Fechatermino,
            ':competencia' =>$valor,
            ':rutaimagen'=>$rutaGuardar,
            ':link'=>$link
        ));
    $id = $conexionX->lastInsertId();
    $sql = $conexionX->prepare("INSERT INTO eventoscalendar(evento,fecha_inicio,fecha_fin,color_evento,lugarevento,id_curso)VALUES (:evento,:fecha_inicio,:fecha_fin,:color_evento,:lugarevento,:id_curso)");
        $sql->execute(array(
            ':evento'=>$Nombrecurso,
            ':fecha_inicio'=>$Fechainicio,
            ':fecha_fin'=>$Fechatermino,
            ':color_evento'=>$color_evento,
            ':lugarevento'=>$LugarImparte,
            ':id_curso'=>$id
        ));
if($mscancer != ''){
            $arraymscancer = array_map("htmlspecialchars", $mscancer);
            foreach ($arraymscancer as $clave => $mscancer) {
                $mscancer = $arraymscancer[$clave];
                $dato[] = '("'.$mscancer.'","'.$id.'")';
                $sql = $conexionX->prepare("INSERT into personalcurso(id_empleado, id_curso) values" . implode(', ', $dato));
    }
    $sql->execute();
}

    if($mscancer2 != ''){
        $arraymscancer2 = array_map("htmlspecialchars", $mscancer2);
        foreach ($arraymscancer2 as $clave2 => $mscancer2) {
            $mscancer2 = $arraymscancer2[$clave2];
            $dato2[] = '("'.$mscancer2.'","'.$id.'")';
            $sql = $conexionX->prepare("INSERT into personalcurso(id_empleado, id_curso) values" . implode(', ', $dato2));
}
$sql->execute();
}
if($mscancer3 != ''){
    $arraymscancer3 = array_map("htmlspecialchars", $mscancer3);
    foreach ($arraymscancer3 as $clave3 => $mscancer3) {
        $mscancer3 = $arraymscancer3[$clave3];
        $dato3[] = '("'.$mscancer3.'","'.$id.'")';
        $sql = $conexionX->prepare("INSERT into personalcurso(id_empleado, id_curso) values" . implode(', ', $dato3));
}
$sql->execute();
}
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'información guardada exitosamente',
            showConfirmButton: false,
            timer: 1900
        })</script>";

}else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar los datos',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}



?>