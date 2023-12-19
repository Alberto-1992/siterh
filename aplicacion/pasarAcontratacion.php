<?php session_start();
require_once '../clases/conexion.php';
$conexionContratacion = new ConexionDocumentacion();
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$identificador = $_POST['curp'];
$hora = date("Y-m-d h:i:sa");

    $conexionContratacion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionContratacion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionContratacion->beginTransaction();
$sql = $conexionContratacion->prepare("UPDATE datospersonales set datosActualizados = :datosActualizados, rechazoContratacion = :rechazoContratacion where curp = :curp");
        $sql->execute(array(
            ':datosActualizados'=>3,
            ':rechazoContratacion'=>0,
            ':curp' =>$identificador
        ));

    $validatransac = $conexionContratacion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registo asignado');
</script>";
    }else{
    $conexionContratacion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}