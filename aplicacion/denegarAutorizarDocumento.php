<?php
error_reporting(0);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$lineaestrategica = '';
$eje = '';
try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
$sql = $conexionX->prepare("UPDATE datos set validaautorizacion = :validaautorizacion, lineaestrategica = :lineaestrategica, ejeestrategico = :ejeestrategico where id = :id");
    $sql->execute(array(
        ':validaautorizacion'=>0,
        ':lineaestrategica'=>$lineaestrategica,
        ':ejeestrategico'=>$eje,
        ':id'=>$id
    ));

    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Autorizado',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
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