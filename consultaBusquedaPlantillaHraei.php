<?php 
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once 'clases/conexion.php';
$conexion = new ConexionRh();
$id = $_POST['id'];

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
$query= $conexion->prepare("SELECT plantillahraei.*, horariosplantilla.*, compatibilidad.* from plantillahraei 
left outer join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado
left outer join compatibilidad on compatibilidad.id_empleado = plantillahraei.Empleado
where plantillahraei.Empleado = $id");
$query->execute();
$dataRegistro= $query->fetch();

$validatransac = $conexion->commit();
    if ($validatransac != false) {
        require 'frontend/vistaplantillahraei.php';
    }else{
    $conexion->rollBack();

}
?>