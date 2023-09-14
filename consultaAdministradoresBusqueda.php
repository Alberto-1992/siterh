<?php session_start();
error_reporting(0);
require_once 'conexionRh.php';
$id = $_POST['id'];
$query = $conexionRh->prepare("SELECT *
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