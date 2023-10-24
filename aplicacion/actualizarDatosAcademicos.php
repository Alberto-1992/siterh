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
    $sql = $conexionX->prepare("INSERT INTO estudiosmediosup(nombreformacionmedia,nombremediasuperior,fechainicio,fechatermino,tiempocursado,documentomediosuperior,id_empleado)
    values(:nombreformacionmedia,:nombremediasuperior,:fechainicio,:fechatermino,:tiempocursado,:documentomediosuperior,:id_empleado)");
    $sql->execute(array(
        ':nombreformacionmedia' => $nombreformacionmedia,
        ':nombremediasuperior' => $nombremediasuperior,
        ':fechainicio' => $fechainicio,
        ':fechatermino' => $fechatermino,
        ':tiempocursado' => $tiempocursado,
        ':documentomediosuperior' => $documentomediosuperior,
        ':id_empleado' => $id_empleado
    ));

    $validatransac = $conexionX->commit();
    require '../conexionRh.php';
    $arraynombreformacion =  $_POST['nombreformacion'];
    $arraynombreinstitucion = $_POST['nombreinstitucion'];
    $arrayfechainicio = $_POST['fechainiciosup'];
    $arrayfechatermino = $_POST['fechaterminosup'];
    $arraytiempocursado = $_POST['tiempocursadosup'];
    $arraydocumentorecibe = $_POST['documentorecibe'];
    $arraynumerocedula = $_POST['numerocedula'];

    $arraynombreformacion = array_map("htmlspecialchars", $arraynombreformacion);
    $arraynombreinstitucion = array_map("htmlspecialchars", $arraynombreinstitucion);
    $arrayfechainicio = array_map("htmlspecialchars", $arrayfechainicio);
    $arraytiempocursado = array_map("htmlspecialchars", $arraytiempocursado);
    $arraynumerocedula = array_map("htmlspecialchars", $arraynumerocedula);

    $sql_array = array();
    foreach ($arraynombreformacion as $clave => $nombreformacion) {
        $nombreinstitucion = $arraynombreinstitucion[$clave];
        $fechainicio = $arrayfechainicio[$clave];
        $fechatermino = $arrayfechatermino[$clave];
        $tiempocursado = $arraytiempocursado[$clave];
        $documentorecibe = $arraydocumentorecibe[$clave];
        $numerocedula = $arraynumerocedula[$clave];
        $datoUnico[] = '("' . $nombreformacion . '", "' . $nombreinstitucion . '", "' . $fechainicio . '", "' . $fechatermino . '", "' . $tiempocursado . '", "' . $documentorecibe . '", "' . $numerocedula . '", "' . $id_empleado . '")';
        $consulta = "INSERT into  estudiossuperior(nombreformacionsuperior,nombresuperior,fechasuperiorinicio,fechasuperiortermino,tiempocursadosuperior,documentosuperior,numerocedulasuperior,id_empleado) VALUES " . implode(', ', $datoUnico);
    }
    mysqli_query($conexionGrafico, $consulta);

    $arraynombreformacionmaestria =  $_POST['nombreformacionmaestria'];
    $arraynombreinstitucionmaestria = $_POST['nombreinstitucionmaestria'];
    $arrayfechainiciomaestria = $_POST['fechainiciosupmaestria'];
    $arrayfechaterminomaestria = $_POST['fechaterminosupmaestria'];
    $arraytiempocursadomaestria = $_POST['tiempocursadosupmaestria'];
    $arraydocumentorecibemaestria = $_POST['documentorecibemaestria'];
    $arraynumerocedulamaestria = $_POST['numerocedulamaestria'];

    $arraynombreformacionmaestria = array_map("htmlspecialchars", $arraynombreformacionmaestria);
    $arraynombreinstitucionmaestria = array_map("htmlspecialchars", $arraynombreinstitucionmaestria);
    $arrayfechainiciomaestria = array_map("htmlspecialchars", $arrayfechainiciomaestria);
    $arraytiempocursadomaestria = array_map("htmlspecialchars", $arraytiempocursadomaestria);
    $arraynumerocedulamaestria = array_map("htmlspecialchars", $arraynumerocedulamaestria);

    $sql_arraymaestria = array();
    foreach ($arraynombreformacionmaestria as $clavemaestria => $nombreformacionmaestria) {
        $nombreinstitucionmaestria = $arraynombreinstitucionmaestria[$clavemaestria];
        $fechainiciomaestria = $arrayfechainiciomaestria[$clavemaestria];
        $fechaterminomaestria = $arrayfechaterminomaestria[$clavemaestria];
        $tiempocursadomaestria = $arraytiempocursadomaestria[$clavemaestria];
        $documentorecibemaestria = $arraydocumentorecibemaestria[$clavemaestria];
        $numerocedulamaestria = $arraynumerocedulamaestria[$clavemaestria];
        $datoUnicomaestria[] = '("' . $nombreformacionmaestria . '", "' . $nombreinstitucionmaestria . '", "' . $fechainiciomaestria . '", "' . $fechaterminomaestria . '", "' . $tiempocursadomaestria . '", "' . $documentorecibemaestria . '", "' . $numerocedulamaestria . '", "' . $id_empleado . '")';
        $consulta2 = "INSERT into  estudiosmaestria(nombreformacionmaestria,nombremaestria,fechamaestriainicio,fechamaestriatermino,tiempocursadomaestria,documentomaestria,numerocedulamaestria,id_empleado) VALUES " . implode(', ', $datoUnicomaestria);
    }
    mysqli_query($conexionGrafico, $consulta2);
    if ($validatransac != false) {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
} catch (Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}
