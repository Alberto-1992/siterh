<?php session_start();
error_reporting(0);
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$query = $conexionX->prepare("SELECT *
from datos where id = :id");
$query->execute(array(
    ':id'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaValidacionDocumentacion.php';
}else{

}

?>