<?php
require '../clases/conexion.php';
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$acceder = $_POST['actualiza'];
$hora = date("Y-m-d h:i:sa");

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
    $sql = $conexion->prepare("UPDATE datospersonales set acceder = :acceder, cargodocumento = :cargodocumento where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':acceder'=>$acceder,
        ':cargodocumento'=>2,
        ':id_datopersonal' =>$id
    ));
    $validatransac = $conexion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Good');
</script>";
    }else {
    $conexion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}