<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM vacaciones WHERE  id_vacaciones='".$id."'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);

?>
  