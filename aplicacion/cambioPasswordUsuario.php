<?php
error_reporting(0);
extract($_POST);   
    $correo = $_POST['correo'];
    $passwordActual= $_POST['passwordActual'];
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];

    $passwordActual = hash('sha512', $passwordActual);
    $password = hash('sha512', $password);
    $cpassword = hash('sha512', $cpassword);
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();

        $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexionX->beginTransaction();

        $sql = $conexionX->prepare("SELECT password from usuarioslogeo where correo = :correo");
            $sql->execute(array(
                ':correo'=>$correo
            ));
            $row = $sql->fetch();
        $validapassword = $row['password'];
    if($passwordActual == $validapassword){
        $statement = $conexionX->prepare("UPDATE usuarioslogeo set password = :password where correo = :correo");       
        $statement->execute(array(
            ':password' =>$password,
            ':correo' => $correo
        
        ));
    
        $validatransac = $conexionX->commit();
    if ($validatransac != false) {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro exitoso',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al registrar usuario',
        showConfirmButton: false,
        timer: 1500
    })</script>";
} 
    }else{
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error tu password actual no es el correcto',
            showConfirmButton: false,
            timer: 2500
        })</script>";
    }


?>