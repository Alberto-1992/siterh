<?php
require_once('../conexionRh.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='".$id."'");
$resultProd = mysqli_query($conexionGrafico, $sqlDeleteEvento);

?>
  