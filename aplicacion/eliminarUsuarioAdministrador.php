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
    $sql = $conexionX->prepare("DELETE from usuariosrh where id_usuario = :id_usuario");
    $sql->execute(array(
        ':id_usuario' => $id
    ));
    $validatransac = $conexionX->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }
} catch (Exception $e) {
    $conexionX->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}