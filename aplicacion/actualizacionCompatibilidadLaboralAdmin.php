<?php session_start();
error_reporting(0);
extract($_POST);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$hora = date("Y-m-d h:i:sa");

    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $sql = $conexionX->prepare("UPDATE compatibilidad set PROTESTADENODES = :PROTESTADENODES, COMPATIBILIDADCONCLUIDAS = :COMPATIBILIDADCONCLUIDAS, COMPATIBILIDADENPROCESO = :COMPATIBILIDADENPROCESO, SIMANIFIESTAOTROEMPLEO = :SIMANIFIESTAOTROEMPLEO, OBSERVACIONES = :OBSERVACIONES, CLAVEPRESUPUESTAL = :CLAVEPRESUPUESTAL, SUELDO = :SUELDO, LUGARDETRABAJO = :LUGARDETRABAJO, HORARIO = :HORARIO, DIASLABORALES = :DIASLABORALES, tipopuesto = :tipopuesto, LUGARDETRABAJO2 = :LUGARDETRABAJO2, HORARIO2 = :HORARIO2, DIASLABORALES2 = :DIASLABORALES2, tipopuesto2 = :tipopuesto2 where id_empleado = :id_empleado");
    $sql->execute(array(
        ':PROTESTADENODES'=>$protestanodesempleo, 
        ':COMPATIBILIDADCONCLUIDAS'=>$compatibilidadconcluida,
        ':COMPATIBILIDADENPROCESO'=>$compatibilidadproceso, 
        ':SIMANIFIESTAOTROEMPLEO'=>$simanifiestaotroempleo, 
        ':OBSERVACIONES'=>$observaciones, 
        ':CLAVEPRESUPUESTAL'=>$clavepresupuestal, 
        ':SUELDO'=>$sueldo,
        ':LUGARDETRABAJO'=>$nombre,
        ':HORARIO'=>$horario,
        ':DIASLABORALES'=>$dias,
        ':tipopuesto'=>$tipopuesto,
        ':LUGARDETRABAJO2'=>$nombreinstitucionsegundo,
        ':HORARIO2'=>$horariosegundo,
        ':DIASLABORALES2'=>$diassegundo,
        ':tipopuesto2'=>$tipopuestosegundo,
        ':id_empleado'=>$id_empleado
    ));
    $sql = $conexionX->prepare("UPDATE compatibilidadotroempleo SET otroempleo = :otroempleo where id_empleado = :id_empleado");
        $sql->execute(array(
            ':otroempleo'=>$otroempleo,
            ':id_empleado'=>$id_empleado
        ));
    $validatransac = $conexionX->commit();
    if ($_FILES["formatoempleouno"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["formatoempleouno"]["type"], $permitidos) && $_FILES["formatoempleouno"]["size"]) {

            $ruta = '../documentoscompatibilidad/'.$id_empleado. '/';
            $archivo = $ruta . $_FILES["formatoempleouno"]["name"] = "Formato compatibilidad uno.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["formatoempleouno"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["formatoempleouno"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    if ($_FILES["formatoempleodos"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["formatoempleodos"]["type"], $permitidos) && $_FILES["formatoempleodos"]["size"]) {

            $ruta = '../documentoscompatibilidad/'.$id_empleado. '/';
            $archivo = $ruta . $_FILES["formatoempleodos"]["name"] = "Formato compatibilidad dos.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["formatoempleodos"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["formatoempleodos"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
    echo $e;
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}
?>