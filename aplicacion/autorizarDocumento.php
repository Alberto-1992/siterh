<?php
error_reporting(0);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
extract($_POST);
try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
$sql = $conexionX->prepare("UPDATE datos set validaautorizacion = :validaautorizacion, catalogoprograma = :catalogoprograma, lineaestrategica = :lineaestrategica, competenciaalieandaeje = :competenciaalieandaeje, computo = :computo  where id = :id");
    $sql->execute(array(
        ':validaautorizacion'=>1,
        ':catalogoprograma'=>$catalogoprogramas,
        ':lineaestrategica'=>$lineaestrategica,
        ':competenciaalieandaeje'=>$organizacionales,
        ':computo'=>$herramientascomputo,
        ':id'=>$id
    ));

    $validatransac = $conexionX->commit();
    
    
    $from = '../documentoscursos/'.$path.'/';
    $carpeta = '../'.$year.'/'.$catalogoprogramas.'/'.$lineaestrategica;

    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    $to = $carpeta.'/';
    //Abro el directorio que voy a leer
    $dir = opendir($from);
    //Recorro el directorio para leer los archivos que tiene
    while($file = readdir($dir)){

        //Leo todos los archivos excepto . y ..
        if (strpos($file, '.') !== 0) {

            copy($from . '/' . $file, $to . '/' .$id_empleado.$file);
        }
    }
    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Autorizado',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al validar',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>