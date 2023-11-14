<?php
require '../conexionRh.php';
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$confirmar = $_POST['confirmar'];
$hora = date("Y-m-d h:i:sa");

    $conexionRol->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionRol->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionRol->beginTransaction();
    $sql = $conexionRol->prepare("UPDATE datospersonales set confirmarasistencia = :confirmarasistencia where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':confirmarasistencia'=>$confirmar,
        ':id_datopersonal' => $id
    ));
    $validatransac = $conexionRol->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Acceso autorizado');
</script>";
    }else{
    $conexionRol->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}