<?php

 require_once '../clases/conexion.php';
 $conexionX = new ConexionRh();
 $id = $_POST["id"];
 $texto = $_POST["texto"];
 $columna = $_POST["columna"];
 

 try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
 $consulta = $conexionX->prepare("UPDATE doctorado set $columna ='$texto' where id_doctorado = $id");
    $consulta->execute();
    //$row = mysqli_query($conexion2, $consulta);
    $validatransac = $conexionX->commit();
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


?>