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
    $sql = $conexionX->prepare("UPDATE datospersonales set fechanacimiento = :fechanacimiento, edad = :edad, estadocivil = :estadocivil, entidadnacimiento = :entidadnacimiento, genero = :genero,tipodesangre = :tipodesangre,
    nacionalidad = :nacionalidad,numerocartillamilitar = :numerocartillamilitar, cartanaturalizacion = :cartanaturalizacion,calle = :calle, numeroexterior = :numeroexterior, numerointerior = :numerointerior,
    codigopostal = :codigopostal, colonia = :colonia, estado = :estado, municipio = :municipio, localidad = :localidad, telefonocasa = :telefonocasa, telefonocelular = :telefonocelular, otrotelefono = :otrotelefono, 
    fechaactualizo = :fechaactualizo, nombreemergencia = :nombreemergencia, telefonoemergencia = :telefonoemergencia, parentescoemergencia = :parentescoemergencia where id_empleado = :id_empleado");
    
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
        ':fechaactualizo'=>$hora,
        ':nombreemergencia'=>$nombreemergencia,
        ':telefonoemergencia'=>$telefonoemergencia,
        ':parentescoemergencia'=>$parentescoemergencia,
        ':id_empleado'=>$id_empleado
    ));
    $validatransac = $conexionX->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido actualizados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al actualizar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}
?>