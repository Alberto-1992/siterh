<?php session_start();
error_reporting(0);
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$id = $_POST['id'];
$query = $conexionX->prepare("SELECT *, EXTRACT(YEAR 
FROM fechatermino) as anio
from datos where id = :id and validaautorizacion = 1");
$query->execute(array(
    ':id'=>$id
));

if($query != false){
    require 'frontend/vistaCursosAutroizados.php';
}else{

}

?>