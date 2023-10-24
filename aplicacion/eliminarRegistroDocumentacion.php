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
try {
    $conexionDocumentacion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionDocumentacion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionDocumentacion->beginTransaction();
    $sql = $conexionDocumentacion->prepare("DELETE from datospersonales where id_datopersonal = :id_datopersonal");
    $sql->execute(array(
        ':id_datopersonal' => $id
    ));
    $actividadeconomica = 'documentoactvidadeconomica';
    $ar = '../../talent/documentos/'.$actividadeconomica.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $actanacimiento = 'documentoactanacimiento';
    $ar = '../../talent/documentos/'.$actanacimiento.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $ine = 'documentoine';
    $ar = '../../talent/documentos/'.$ine.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $cartilla = 'documentocartilla';
    $ar = '../../talent/documentos/'.$cartilla.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $firmaelectronica = 'documentofirmaelectonica';
    $ar = '../../talent/documentos/'.$firmaelectronica.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $claveinter = 'documentoclaveinterbancaria';
    $ar = '../../talent/documentos/'.$claveinter.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobantedomicilio';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante media superior';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante superior';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador ;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula superior';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante maestria';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula maestria';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante maestria dos';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula maestria dos';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante posgrado';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula posgrado';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante doctorado';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'cedula doctorado';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante alta epecialidad';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante otro estudio';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'comprobante otro estudio segundo';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento servicio social';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento practicas profesionales';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento certificacion uno';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento certificacion dos';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento actualizacion academica uno';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento actualizacion academica dos';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento actualizacion academica tres';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral primero 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral primero 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral segundo 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral segundo 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral tercero 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral tercero 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }


    $compdomicilio = 'documento exp laboral publico primero 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral publico primero 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral publico segundo 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral publico segundo 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral publico tercero 1';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $compdomicilio = 'documento exp laboral publico tercero 2';
    $ar = '../../talent/documentos/'.$compdomicilio.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    $validatransac = $conexionDocumentacion->commit();

    if ($validatransac != false) {
        echo "<script>alertify.success('Registro eliminado');
</script>";
    }
} catch (Exception $e) {
    $conexionDocumentacion->rollBack();
    echo "<script>alertify.error('Error inesperado');
    </script>";
}