<?php session_start();
error_reporting(0);
require_once 'conexionRh.php';
$id = $_POST['id'];
$query = $conexionRh->prepare("SELECT *
from datos where id = :id");
$query->execute(array(
    ':id'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaCursosAutroizados.php';
}else{

}

?>