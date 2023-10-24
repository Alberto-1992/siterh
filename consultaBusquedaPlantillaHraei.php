<?php 
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$query= $conexionX->prepare("SELECT * from plantillahraei
where plantillahraei.Empleado = $id");
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    
    require 'frontend/vistaplantillahraei.php';
}else{
    
}

?>