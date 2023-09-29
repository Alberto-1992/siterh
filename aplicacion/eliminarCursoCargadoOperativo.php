<?php
require '../conexionRh.php';
$id = $_POST['id'];
$nombrecurso = $_POST["nombrecurso"];
$fechatermino = $_POST['fechatermino'];
$id_empleado = $_POST['id_empleado'];
$sql = $conexionRh->prepare("DELETE from datos where id = :id");
    $sql->execute(array(
        ':id'=>$id
    ));
    $curso = '../documentoscursos/'.$nombrecurso.$fechatermino.$id_empleado;
    foreach(glob($curso."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);  
            rmdir($curso);   // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    if($sql){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Eliminado',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al eliminar//',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
?>