<?php

require_once '../clases/conexion.php';
$conexionX = new ConexionRh();

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);


    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
error_reporting(0);

    $sql = $conexionX->prepare("INSERT into observaciones(datospersonales, datosacademicos, compatibilidad, correousuarioobservacion, id_empleado, fechaobservacion) values(:datospersonales, :datosacademicos, :compatibilidad, :correousuarioobservacion, :id_empleado, :fechaobservacion)");
    $sql->execute(array( 
        ':datospersonales'=>$comentariodatospersonales, 
        ':datosacademicos'=>$comentariodatosacademicos, 
        ':compatibilidad'=>$comentariodatoscompatibilidad, 
        ':correousuarioobservacion'=>$correogenerocomentario, 
        ':id_empleado'=>$numempleado, 
        ':fechaobservacion'=>$fechahoy
        
        ));
        $validatransac = $conexionX->commit();

        if($validatransac != false){
            echo "<script>Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Datos cargados',
                showConfirmButton: false,
                timer: 1900
            })</script>";
        
        }else{
        $conexionX->rollBack();
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al cargar informacion',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    }

?>