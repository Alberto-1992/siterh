<?php
error_reporting(0);
require_once '../conexionRh.php';

$sql = "UPDATE datos SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conexionGrafico, $sql);

$sql = "SELECT * FROM datos where validaautorizacion = 0 ORDER BY id DESC limit 25";
$result = mysqli_query($conexionGrafico, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"*<span>". $row['id_empleado'] . "</span><a href='verDocumentoparaValidacion?id=".$row['id']."'><div class='notification-subject'>".$row["nombreinstitucion"]." - <span>". $fechaFormateada . "</span> </div></a>" . 
	"<div class='notification-comment'>" . $row["nombrecurso"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>