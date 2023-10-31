<?php
date_default_timezone_set("America/Monterrey");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("../conexionRh.php");
$hora = ucwords($_REQUEST['hora']);
$lugarevento = ucwords($_REQUEST['lugarevento']);
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];



$InsertNuevoEvento = "INSERT INTO eventoscalendar(
      evento,
      fecha_inicio,
      fecha_fin,
      color_evento,
      horacurso,
      lugarevento
      )
    VALUES (
      '" .$evento. "',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_evento. "',
      '" .$hora. "',
      '" .$lugarevento. "'
  )";
$resultadoNuevoEvento = mysqli_query($conexionGrafico, $InsertNuevoEvento);

header("Location:index.php?e=1");

?>