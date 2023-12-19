<?php
require_once '../clases/conexion.php';
$conexionDocumentacion = new ConexionDocumentacion();
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$identificador = $_POST['curp'];
$hora = date("Y-m-d h:i:sa");
$sql = $conexion->prepare("UPDATE datospersonales set cargodocumento = :cargodocumento where curp = :curp");
        $sql->execute(array(
            ':cargodocumento'=>2,
            ':curp' =>$identificador
        ));
    $conexionDocumentacion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionDocumentacion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionDocumentacion->beginTransaction();
    $sql = $conexionDocumentacion->prepare("DELETE from datospersonales where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':id_datopersonal' => $id
    ));
    
    $ar = '../../talent/documentos/'.$id;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);    // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    
    $validatransac = $conexionDocumentacion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }else {
    $conexionDocumentacion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}