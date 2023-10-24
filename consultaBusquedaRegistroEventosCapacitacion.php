<?php 
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$query= $conexionX->prepare("SELECT nombre_capacitacion.*, are_cordina.nombre_areacordina, provedor.* from nombre_capacitacion inner join are_cordina on are_cordina.id_area_cordina = nombre_capacitacion.id_areacordinacion
inner join provedor on provedor.id_probedor = nombre_capacitacion.id_provedor
where nombre_capacitacion.id_capacitacion = $id");
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    
    require 'frontend/vistaRegistroEventosCapacitacion.php';
}else{
    
}

?>