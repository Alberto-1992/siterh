<?php 
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];

    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
$query= $conexionX->prepare("SELECT plantillahraei.*, horariosplantilla.*, compatibilidad.* from plantillahraei inner join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado
inner join compatibilidad on compatibilidad.id_empleado = plantillahraei.Empleado
where plantillahraei.Empleado = $id");
$query->execute();
$dataRegistro= $query->fetch();

$validatransac = $conexionX->commit();
    if ($validatransac != false) {
        require 'frontend/vistaCompatibilidad.php';
    }else{
    $conexionX->rollBack();

}
?>