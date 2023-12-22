<?php

require '../clases/conexion.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);
$conexion = new ConexionRh();
//error_reporting(0);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();

    $sql = $conexion->prepare("INSERT INTO intoduccionpuesto(fecha_Inicio, fecha_conclucion, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, porque, Comentario, id_empleado) Values(:fecha_Inicio, :fecha_conclucion, :pregunta1, :pregunta2, :pregunta3,:pregunta4,:pregunta5, :pregunta6,:pregunta7, :pregunta8, :pregunta9, :pregunta10, :pregunta11, :pregunta12, :pregunta13, :pregunta14, :pregunta15, :pregunta16, :pregunta17, :pregunta18, :porque, :Comentario, :id_empleado)");
    $sql->execute(array(
            ':fecha_Inicio' => $fechainicio,
            ':fecha_conclucion' => $fechatermino,
            ':pregunta1' => $pregunta1,
            ':pregunta2' => $pregunta2,
            ':pregunta3' => $pregunta3,
            ':pregunta4' => $pregunta4,
            ':pregunta5' => $pregunta5,
            ':pregunta6' => $pregunta6,
            ':pregunta7' => $pregunta7,
            ':pregunta8' => $pregunta8,
            ':pregunta9' => $pregunta9,
            ':pregunta10' => $pregunta10,
            ':pregunta11' => $pregunta11,
            ':pregunta12' => $pregunta12,
            ':pregunta13' => $pregunta13,
            ':pregunta14' => $pregunta14,
            ':pregunta15' => $pregunta15,
            ':pregunta16' => $pregunta16,
            ':pregunta17' => $pregunta17,
            ':pregunta18' => $pregunta18,
            ':porque' => $Porque,
            ':Comentario' => $Comentario,
            ':id_empleado'=>$Empleado

        ));
        $validatransac = $conexion->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
    $conexion->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>