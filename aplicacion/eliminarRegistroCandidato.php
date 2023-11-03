<?php session_start();
require '../clases/conexion.php';
$conexion = new Conexion();
date_default_timezone_set("America/Monterrey");
$id = $_POST['id'];
$identificador = $_POST['curp'];
$hora = date("Y-m-d h:i:sa");
try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
    $sql = $conexion->prepare("DELETE from datospersonales where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':id_datopersonal' => $id
    ));
    $compdomicilio = 'documentocurp';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobantedomicilio';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante media superior';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante superior';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula superior';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante maestria';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula maestria';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante maestria dos';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula maestria dos';
    $ar = '../../reestructuracionpaginawebhraei/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $validatransac = $conexion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }
} catch (Exception $e) {
    $conexion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}
