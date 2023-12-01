<?php
    require '../clases/conexion.php';
    $conexion = new ConexionRh();
extract($_POST);
$password = $_POST['rfc'];
$password = hash('sha512', $password);

try{
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
    $conexion->beginTransaction();
    
    $sql = $conexion->prepare("INSERT INTO usuarioslogeojefes(numTrabajador,password,curp,correo,rol,eliminado)
    values(:numTrabajador,:password,:curp,:correo,:rol,:eliminado)");
        $sql->execute(array(
            ':numTrabajador'=>$numempleado,
            ':password'=>$password,
            ':curp'=>$curp,
            ':correo'=>$correo,
            ':rol'=>4,
            ':eliminado'=>0
        ));
        $validatransac = $conexion->commit();
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