<?php session_start();
error_reporting(0);
require_once 'clases/conexion.php';
$conexion = new ConexionRh();
$id = $_POST['id'];
$query = $conexion->prepare("SELECT *
from usuariosrh where id_usuario = :id_usuario");
$query->execute(array(
    ':id_usuario'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaAdministradores.php';
}else{

}

?>