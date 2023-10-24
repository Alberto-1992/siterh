<?php session_start();
require_once '../clases/conexion.php';
$conexionContratacion = new ConexionDocumentacion();
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$identificador = $_POST['curp'];
$hora = date("Y-m-d h:i:sa");
try {
    $conexionContratacion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionContratacion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionContratacion->beginTransaction();
$sql = $conexionContratacion->prepare("UPDATE datospersonales set datosActualizados = :datosActualizados where curp = :curp");
        $sql->execute(array(
            ':datosActualizados'=>1,
            ':curp' =>$identificador
        ));

    $validatransac = $conexionContratacion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }
} catch (Exception $e) {
    $conexionContratacion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}