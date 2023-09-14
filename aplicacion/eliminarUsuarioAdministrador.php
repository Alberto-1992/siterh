<?php
require '../conexionRh.php';
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$hora = date("Y-m-d h:i:sa");

try {
    $conexionRh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionRh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionRh->beginTransaction();
    $sql = $conexionRh->prepare("DELETE from usuariosrh where id_usuario = :id_usuario");
    $sql->execute(array(
        ':id_usuario' => $id
    ));
    $validatransac = $conexionRh->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }
} catch (Exception $e) {
    $conexionRol->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}