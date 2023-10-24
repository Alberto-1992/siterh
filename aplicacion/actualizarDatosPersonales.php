<?php session_start();
error_reporting(0);
extract($_POST);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$hora = date("Y-m-d h:i:sa");

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
    $sql = $conexionX->prepare("INSERT INTO datospersonales(fechanacimiento,edad,estadocivil,entidadnacimiento,genero,tipodesangre,nacionalidad,numerocartillamilitar,cartanaturalizacion,calle,numeroexterior,numerointerior,codigopostal,colonia,estado,municipio,localidad,telefonocasa,telefonocelular,otrotelefono,id_empleado,fechaactualizo,nombreemergencia,telefonoemergencia,parentescoemergencia)
    values(:fechanacimiento,:edad,:estadocivil,:entidadnacimiento,:genero,:tipodesangre,:nacionalidad,:numerocartillamilitar,:cartanaturalizacion,:calle,:numeroexterior,:numerointerior,:codigopostal,:colonia,:estado,:municipio,:localidad,:telefonocasa,:telefonocelular,:otrotelefono,:id_empleado,:fechaactualizo,:nombreemergencia,:telefonoemergencia,:parentescoemergencia)");
    $sql->execute(array(
        ':fechanacimiento'=>$fechanacimiento,
        ':edad'=>$edad,
        ':estadocivil'=>$estadocivil,
        ':entidadnacimiento'=>$entidadnacimiento,
        ':genero'=>$sexo,
        ':tipodesangre'=>$tipodesangre,
        ':nacionalidad'=>$nacionalidad,
        ':numerocartillamilitar'=>$cartillamilitar,
        ':cartanaturalizacion'=>$naturalizacion,
        ':calle'=>$calle,
        ':numeroexterior'=>$numeroexterior,
        ':numerointerior'=>$numerointerior,
        ':codigopostal'=>$codigopostal,
        ':colonia'=>$colonia,
        ':estado'=>$cbx_estado,
        ':municipio'=>$cbx_municipio,
        ':localidad'=>$localidad,
        ':telefonocasa'=>$telcasa,
        ':telefonocelular'=>$telcel,
        ':otrotelefono'=>$otrotel,
        ':id_empleado'=>$id_empleado,
        ':fechaactualizo'=>$hora,
        ':nombreemergencia'=>$nombreemergencia,
        ':telefonoemergencia'=>$telefonoemergencia,
        ':parentescoemergencia'=>$parentescoemergencia
    ));
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
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
