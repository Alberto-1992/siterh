<?php

require_once '../clases/conexion.php';
$conexionX = new ConexionRh();

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
$id = $_POST['id'];

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
error_reporting(0);


    $sql = $conexionX->prepare("UPDATE vacaciones set autoriza = :autoriza where id_empleado = :id_empleado and periodovacacional = 2023");
    $sql->execute(array(

            ':autoriza' => 1,
            ':id_empleado' => $id
        
        ));

    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Las vaciones fueron autorizadas',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    
    }

} catch (Exception $th) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al autorizar vacaciones',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}

?>