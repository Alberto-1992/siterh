<?php 
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$query= $conexionX->prepare("SELECT plantillahraei.*, horariosplantilla.*, compatibilidad.* from plantillahraei inner join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado
left join compatibilidad on compatibilidad.id_empleado = plantillahraei.Empleado
where plantillahraei.Empleado = $id");
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    
    require 'frontend/vistaPlantillaEnfermeria.php';
}else{
    
}

?>