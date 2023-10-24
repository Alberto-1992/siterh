<?php
date_default_timezone_set("America/Monterrey");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$id_empleado = ucwords($_REQUEST['id_empleado']);
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];
$periodovacacional = 2023;



$InsertNuevoEvento = "INSERT INTO vacaciones(
      evento,
      fecha_inicio,
      fecha_fin,
      color_vacaciones,
      id_empleado,
      periodovacacional
      )
    VALUES (
      '". $evento."',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_evento. "',
      '" .$id_empleado. "',
      '".$periodovacacional."'
  )";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:index.php?e=1");

?>