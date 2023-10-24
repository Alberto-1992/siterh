<?php session_start();
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$hora = date("Y-m-d h:i:sa");

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $sql = $conexionX->prepare("DELETE from estudiosmaestria where id_maestria = :id_maestria");
    $sql->execute(array(
        ':id_maestria'=>$id
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
?>