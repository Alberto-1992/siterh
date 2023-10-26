<?php session_start();
error_reporting(0);
extract($_POST);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$hora = date("Y-m-d h:i:sa");

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $sql = $conexionX->prepare("UPDATE compatibilidad set LUGARDETRABAJO = :LUGARDETRABAJO, HORARIO = :HORARIO, DIASLABORALES = :DIASLABORALES, tipopuesto = :tipopuesto, LUGARDETRABAJO2 = :LUGARDETRABAJO2, HORARIO2 = :HORARIO2, DIASLABORALES2 = :DIASLABORALES2, tipopuesto2 = :tipopuesto2 where id_empleado = :id_empleado");
    $sql->execute(array(
        ':LUGARDETRABAJO'=>$nombre,
        ':HORARIO'=>$horario,
        ':DIASLABORALES'=>$dias,
        ':tipopuesto'=>$tipopuesto,
        ':LUGARDETRABAJO2'=>$nombreinstitucionsegundo,
        ':HORARIO2'=>$horariosegundo,
        ':DIASLABORALES2'=>$diassegundo,
        ':tipopuesto2'=>$tipopuestosegundo,
        ':id_empleado'=>$id_empleado
    ));
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
    echo $e;
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}
?>