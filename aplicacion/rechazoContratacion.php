<?php session_start();
require_once '../clases/conexion.php';
$conexionContratacion = new ConexionDocumentacion();
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$hora = date("Y-m-d h:i:sa");
$sql = $conexion->prepare("UPDATE datospersonales set acceder = :acceder, cargodocumento = :cargodocumento where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':acceder'=>1,
        ':cargodocumento'=>2,
        ':id_datopersonal'=>$id
    ));

    $conexionContratacion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionContratacion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionContratacion->beginTransaction();
$sql = $conexionContratacion->prepare("DELETE from datospersonales where id_datopersonal = :id_datopersonal");
        $sql->execute(array(
            ':id_datopersonal' =>$id
        ));


    $validatransac = $conexionContratacion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }else{
    $conexionContratacion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}