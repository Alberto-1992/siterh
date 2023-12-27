<?php

require '../clases/conexion.php';

date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);
$conexion = new ConexionRh();
error_reporting(0);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();

    $sql = $conexion->prepare("INSERT into intoduccionpuesto(fecha_Inicio, fecha_conclucion, Entrevistajefe, lenguajeutilizo, precentacionoficial, presentaempleados, infOrganigrama, funcionesyrespo, objetivosypoliticas, plantrabajo, normasarea, protocoloypocedimiento, actiextraordinarias, ubicacionmobiliario, principaleservicios, solicitudyprogramacion, desempenorepercute, fueutil, retroalimentacion, tiempoutilisado, porque, Comentario, id_Empleado) VALUES(:fecha_Inicio, :fecha_conclucion, :Entrevistajefe, :lenguajeutilizo, :precentacionoficial, :presentaempleados, :infOrganigrama, :funcionesyrespo, :objetivosypoliticas, :plantrabajo, :normasarea, :protocoloypocedimiento, :actiextraordinarias, :ubicacionmobiliario, :principaleservicios, :solicitudyprogramacion, :desempenorepercute, :fueutil, :retroalimentacion, :tiempoutilisado, :porque, :Comentario, :id_Empleado)");
    $sql->execute(array(
            ':fecha_Inicio' => $fechainicio,
            ':fecha_conclucion' => $fecchatermino,
            ':Entrevistajefe' => $Entrevistajefe,
            ':lenguajeutilizo' => $lenguajeutilizo,
            ':precentacionoficial' => $precentacionoficial,
            ':presentaempleados' => $presentaempleados,
            ':infOrganigrama' => $infOrganigrama,
            ':funcionesyrespo' => $funcionesyrespo,
            ':objetivosypoliticas' => $objetivosypoliticas,
            ':plantrabajo' => $plantrabajo,
            ':normasarea' => $normasarea,
            ':protocoloypocedimiento' => $protocoloypocedimiento,
            ':actiextraordinarias' => $actiextraordinarias,
            ':ubicacionmobiliario' => $ubicacionmobiliario,
            ':principaleservicios' => $principaleservicios,
            ':solicitudyprogramacion' => $solicitudyprogramacion,
            ':desempenorepercute' => $desempeñorepercute,
            ':fueutil' => $fueutil,
            ':retroalimentacion' => $retroalimentacion,
            ':tiempoutilisado' => $tiempoutilisado,
            ':porque' => $Porque,
            ':Comentario' => $Comentario,
            ':id_Empleado'=>$Empleado

        )
    );
        $validatransac = $conexion->commit();

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    
    }else{
    $conexion->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>