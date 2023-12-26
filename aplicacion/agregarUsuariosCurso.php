<?php session_start();
error_reporting(0);
require '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);


if($mscancer3 != ''){
    $arraymscancer3 = array_map("htmlspecialchars", $mscancer3);
    foreach ($arraymscancer3 as $clave3 => $mscancer3) {
        $mscancer3 = $arraymscancer3[$clave3];
        $dato3[] = '("'.$mscancer3.'","'.$id_capacitacion.'")';
        $sql = $conexionX->prepare("INSERT into personalcurso(id_empleado, id_curso) values" . implode(', ', $dato3));
}
$sql->execute();
}

    if($sql != false){
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Usuario agregado al curso exitosamente',
            showConfirmButton: false,
            timer: 1900
        })</script>";

}else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar los datos',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}



?>