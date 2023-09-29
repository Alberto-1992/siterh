<?php
require '../conexionRh.php';
$id = $_GET['id'];
$nombrecurso = $_GET["nombrecurso"];
$fechatermino = $_GET['fechatermino'];
$id_empleado = $_GET['id_empleado'];
$sql = $conexionRh->prepare("DELETE from datos where id = :id");
    $sql->execute(array(
        ':id'=>$id
    ));
    $curso = '../documentoscursos/'.$nombrecurso.$fechatermino.$id_empleado;
    foreach(glob($curso."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);
            rmdir($curso);      // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    if($sql){
        header( 'Location: ../validaDocumentacionCursos' ) ;
    }else{
        echo "<script>alert('error');</script>";
    }
?>

