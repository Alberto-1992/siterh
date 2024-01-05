<?php
    extract($_POST);

    if ($_FILES["archivobeca"]["name"] == null) {
        
    } else {

        $permitidos = array("application/pdf");
        $nombreFormato = $idevento.'_'.$empleado;
        if (in_array($_FILES["archivobeca"]["type"], $permitidos) && $_FILES["archivobeca"]["size"]) {

            $ruta = 'formatosbecatiempo/'.$empleado.'/';
            $archivo = $ruta . $_FILES["archivobeca"]["name"] = $nombreFormato.".pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                @move_uploaded_file($_FILES["archivobeca"]["tmp_name"], $archivo);
            } else {
                @move_uploaded_file($_FILES["archivobeca"]["tmp_name"], $archivo);
            }
            
        }
        
    }
require 'clases/conexion.php';
$conexion = new ConexionRh();
    $sql = $conexion->prepare("UPDATE eventocapacitacion set rutadocumentofirmado = :rutadocumentofirmado where id_evento = :id_evento");
        $sql->execute(array(
            ':rutadocumentofirmado'=>$ruta,
            ':id_evento'=>$idevento
        ));
        if($sql == true){
    echo "<script>alert('Formato cargado');
    window.location.href='solicitudpermisoadministrativo'</script>";
        }
   
   
    ?>