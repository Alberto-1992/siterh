<?php

require_once 'clases/conexion.php';
$conexionX = new ConexionRh();

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);

    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
error_reporting(0);

        if ($_FILES["comprobantecurso"]["error"] > 0) {
        
        } else {
    
            $permitidos = array("application/pdf");
            
            if (in_array($_FILES["comprobantecurso"]["type"], $permitidos) && $_FILES["comprobantecurso"]["size"]) {
    
                $ruta = 'documentobecatiempo/'.$Eventoacademico.$DateAndTime.$numeroEm. '/';
                $archivo = $ruta . $_FILES["comprobantecurso"]["name"] = "comprobatedocumento.pdf";
    
    
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
    
                if (file_exists($archivo)) {
    
                    $resultado = @move_uploaded_file($_FILES["comprobantecurso"]["tmp_name"], $archivo);
                } else {
                    $resultado = @move_uploaded_file($_FILES["comprobantecurso"]["tmp_name"], $archivo);
                }
                
            }
            
        }
    if($temapresentara == ''){
        $sql = $conexionX->prepare("INSERT INTO eventocapacitacion (Nombre_evento, modalidad_actividades, fecha_inicia, fecha_termino, horario_establecido, anotedocumentos, descripcionevento, lugar_dondeimpar,tipodecurso,asistecomo,id_empleado,tipoCursoIntExt,fechagenerosolicitud,tipode) 
    VALUES (:Nombre_evento, :modalidad_actividades, :fecha_inicia, :fecha_termino, :horario_establecido, :anotedocumentos, :descripcionevento,:lugar_dondeimpar,:tipodecurso,:asistecomo,:id_empleado,:tipoCursoIntExt,:fechagenerosolicitud,:tipode)");
    $sql->execute(array(

            ':Nombre_evento' => $Eventoacademico,
            ':modalidad_actividades' => $Modalidad,
            ':fecha_inicia' => $Fechainicioevento,
            ':fecha_termino' => $Fechaterminoevento,
            ':horario_establecido' => $Horarios,
            ':anotedocumentos' => $ruta,
            ':descripcionevento' => $comentarioSolicitud,
            ':lugar_dondeimpar' =>$lugarimpartira,
            ':tipodecurso'=>$tipoCurso,
            ':asistecomo'=>$asistecomo, 
            ':id_empleado'=>$numeroEm,
            ':tipoCursoIntExt'=>$tipoCursoIntExt,
            ':fechagenerosolicitud'=>$DateAndTime,
            ':tipode'=>$tipode
        ));
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Gracias por participar, tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    
    }else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}
    }else{
        $sql = $conexionX->prepare("INSERT INTO eventocapacitacion (Nombre_evento, modalidad_actividades, fecha_inicia, fecha_termino, horario_establecido, anotedocumentos, descripcionevento, lugar_dondeimpar,tipodecurso,asistecomo,id_empleado,tipoCursoIntExt,fechagenerosolicitud,tipode,temapresentara) 
    VALUES (:Nombre_evento, :modalidad_actividades, :fecha_inicia, :fecha_termino, :horario_establecido, :anotedocumentos, :descripcionevento,:lugar_dondeimpar,:tipodecurso,:asistecomo,:id_empleado,:tipoCursoIntExt,:fechagenerosolicitud,:tipode,:temapresentara)");
    $sql->execute(array(

            ':Nombre_evento' => $Eventoacademico,
            ':modalidad_actividades' => $Modalidad,
            ':fecha_inicia' => $Fechainicioevento,
            ':fecha_termino' => $Fechaterminoevento,
            ':horario_establecido' => $Horarios,
            ':anotedocumentos' => $ruta,
            ':descripcionevento' => $comentarioSolicitud,
            ':lugar_dondeimpar' =>$lugarimpartira,
            ':tipodecurso'=>$tipoCurso,
            ':asistecomo'=>$asistecomo, 
            ':id_empleado'=>$numeroEm,
            ':tipoCursoIntExt'=>$tipoCursoIntExt,
            ':fechagenerosolicitud'=>$DateAndTime,
            ':tipode'=>$tipode,
            ':temapresentara'=>$temapresentara
        ));
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Gracias por participar, tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    
    }else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}
    }
?>