<?php
error_reporting(0);
	require_once '../conexionRh.php';
	$count=0;
	if(!empty($_POST['add'])) {
		$autor = mysqli_real_escape_string($conn,$_POST["autor"]);
		$mensaje = mysqli_real_escape_string($conn,$_POST["mensaje"]);
		$sql = "INSERT INTO datos (id_empleado,nombreinstitucion,nombrecurso,fechainicio,fechatermino,areaquefortalece) VALUES('" . $autor . "','" . $mensaje . "')";
		mysqli_query($conexionGrafico, $sql);
	}
	$sql2="SELECT * FROM datos WHERE estado = 0";
	$result=mysqli_query($conexionGrafico, $sql2);
	$count=mysqli_num_rows($result);

	header( 'Location: ../validaDocumentacionCursos' ) ;
?>
