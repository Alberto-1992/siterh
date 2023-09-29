<?php
	require_once 'conexionRh.php';
    $count = 0;
    $sql2 = "SELECT * FROM datos WHERE estado = 0";
    $result = mysqli_query($conexionGrafico, $sql2);
    $count = mysqli_num_rows($result);
