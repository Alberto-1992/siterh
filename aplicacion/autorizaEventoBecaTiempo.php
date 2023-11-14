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

        $sql = $conexionX->prepare("UPDATE eventocapacitacion set comentariojefe = :comentariojefe, validaautorizacion = :validaautorizacion where id_evento = :id_evento"); 
    $sql->execute(array(

            ':comentariojefe' => $comentarioJefe,
            ':validaautorizacion' =>$validacion,
            ':id_evento'=>$id_evento
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

?>