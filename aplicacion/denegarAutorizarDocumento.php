<?php
error_reporting(0);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$catalogoprograma = '';
$lineaestrategica = '';
$competenciaalieandaeje = '';

    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
$sql = $conexionX->prepare("UPDATE datos set validaautorizacion = :validaautorizacion, catalogoprograma = :catalogoprograma, lineaestrategica = :lineaestrategica, competenciaalieandaeje = :competenciaalieandaeje where id = :id");
    $sql->execute(array(
        ':validaautorizacion'=>0,
        ':catalogoprograma'=>$catalogoprograma,
        ':lineaestrategica'=>$lineaestrategica,
        ':competenciaalieandaeje'=>$competenciaalieandaeje,
        ':id'=>$id
    ));

    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Autorización rechazada',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al validar',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>