<?php
require_once('../conexionRh.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM vacaciones WHERE  id_vacaciones='".$id."'");
$resultProd = mysqli_query($conexionGrafico, $sqlDeleteEvento);

?>
  