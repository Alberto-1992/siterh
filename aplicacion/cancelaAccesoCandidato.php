<?php session_start();
require '../clases/conexion.php';
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$identificador = $_POST['curp'];
$hora = date("Y-m-d h:i:sa");

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
    $sql = $conexion->prepare("UPDATE datospersonales set acceder = :acceder, cargodocumento = :cargodocumento where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':acceder'=>0,
        ':cargodocumento'=>0,
        ':id_datopersonal'=>$id
    ));
    $compdomicilio = 'documentocurp';
    $ar = '../../talent/documentos/'.$id ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    
    $validatransac = $conexion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }else {
    $conexion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}