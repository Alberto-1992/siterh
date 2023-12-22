<?php
error_reporting(0);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
extract($_POST);
date_default_timezone_set("America/Monterrey");
$fechahoy = date("Y-m-d");
$valor = '';
if($organizacionales != ''){
    $valor = $organizacionales;
}else if($directivas != ''){
    $valor = $directivas;
}else if($competencias != ''){
    $valor = $competencias;
}else if($tecnicas != ''){
    $valor = $tecnicas;
}else if($tecnicasmando != ''){
    $valor = $tecnicasmando;
}else if($tecnicasmuec != ''){
    $valor = $tecnicasmuec;
}else if($competenciasintegrativas){
    $valor = $competenciasintegrativas;
}else if($competenciasespecializadas != ''){
    $valor = $competenciasespecializadas;
}
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
$sql = $conexionX->prepare("UPDATE datos set validaautorizacion = :validaautorizacion, catalogoprograma = :catalogoprograma, lineaestrategica = :lineaestrategica, competenciaalieandaeje = :competenciaalieandaeje, fechavalidacion = :fechavalidacion  where id = :id");
    $sql->execute(array(
        ':validaautorizacion'=>1,
        ':catalogoprograma'=>$catalogoprogramas,
        ':lineaestrategica'=>$lineaestrategica,
        ':competenciaalieandaeje'=>$valor,
        ':id'=>$id,
        ':fechavalidacion'=>$fechahoy
    ));

    $validatransac = $conexionX->commit();
    $from = '../documentoscursos/'.$path.'/';
    $carpeta = '../'.$year.'/'.$catalogoprogramas.'/'.$lineaestrategica.'/'.$valor;

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

}else{
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