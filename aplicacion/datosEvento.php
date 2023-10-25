<?php

require_once '../clases/conexion.php';
$conexionX = new ConexionRh();

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
error_reporting(0);


    $sql = $conexionX->prepare("INSERT INTO eventocapacitacion (Nombre_evento, modalidad_actividades, fecha_inicia, fecha_termino, horario_establecido, anotedocumentos, descripcionevento, ligar_dondeinpar,tipodecurso,id_empleado) 
    VALUES (:Nombre_evento, :modalidad_actividades, :fecha_inicia, :fecha_termino, :horario_establecido, :anotedocumentos, :descripcionevento,:ligar_dondeinpar,:tipodecurso,:id_empleado)");
    $sql->execute(array(

            ':Nombre_evento' => $Eventoacademico,
            ':modalidad_actividades' => $Modalidad,
            ':fecha_inicia' => $Fechainicioevento,
            ':fecha_termino' => $Fechaterminoevento,
            ':horario_establecido' => $Horarios,
            ':anotedocumentos' => $comentario,
            ':descripcionevento' => $comentarioSolicitud,
            ':ligar_dondeinpar' =>$lugarimpartira,
            ':tipodecurso'=>$tipoCurso,
            ':id_empleado'=>$numeroEm
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
    
    }

} catch (Exception $th) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}

?>