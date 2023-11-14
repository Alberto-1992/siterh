<?php
require '../conexionRh.php';
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$acceder = $_POST['actualiza'];
$hora = date("Y-m-d h:i:sa");

    $conexionRol->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionRol->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionRol->beginTransaction();
    $sql = $conexionRol->prepare("UPDATE datospersonales set acceder = :acceder, cargodocumento = :cargodocumento where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':acceder'=>$acceder,
        ':cargodocumento'=>2,
        ':id_datopersonal' =>$id
    ));
    $validatransac = $conexionRol->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Good');
</script>";
    }else {
    $conexionRol->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}