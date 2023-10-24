<?php
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$hora = date("Y-m-d h:i:sa");

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $sql = $conexionX->prepare("DELETE from nombre_capacitacion where id_capacitacion = :id_capacitacion");
    $sql->execute(array(
        ':id_capacitacion'=>$id
    ));
    $sql = $conexionX->prepare("DELETE from eventoscalendar where id_curso = :id_curso");
    $sql->execute(array(
        ':id_curso'=>$id
    ));
    $validatransac = $conexionX->commit();

    if ($validatransac != false) {
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Registro eliminado',
            showConfirmButton: false,
            timer: 1900
        })</script>";
    }
} catch (Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Error al eliminar el registro',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}