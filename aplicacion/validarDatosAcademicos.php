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

    $sql = $conexionX->prepare("SELECT id_empleado from validaciones where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetch();
        $validacion = $row['id_empleado'];

        if($validacion != $id){
    $sql = $conexionX->prepare("INSERT into validaciones(validoinfoacademica, correoacademico, id_empleado) values(:validoinfoacademica, :correoacademico, :id_empleado)");
    $sql->execute(array( 
        ':validoinfoacademica'=>1, 
        ':correoacademico'=>$correovalido, 
        ':id_empleado'=>$id
        
        ));
    }else if($validacion == $id){
        $sql = $conexionX->prepare("UPDATE validaciones SET validoinfoacademica = :validoinfoacademica, correoacademico = :correoacademico WHERE id_empleado = :id_empleado");
        $sql->execute(array(
            ':validoinfoacademica'=>1, 
            ':correoacademico'=>$correovalido, 
            ':id_empleado'=>$id
            
            ));
    }
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Validacion exitosa',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    
    }else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al validar',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}

?>