<?php session_start();
error_reporting(0);
require 'clases/conexion.php';
            $conexion = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            $sql = $conexion->prepare("SELECT * FROM plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $validacorreo = $row['correo'];
            if($validacorreo == $usernameSesion){
            require 'frontend/compatibilidad.php';
            }else{
                echo "<script>alert('Entrada no valida'); window.history.back();</script>";
            }
            
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $sql = $conexion->prepare("SELECT * FROM plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $validacorreo = $row['correo'];
            if($validacorreo != ''){
            require 'frontend/compatibilidad.php';
            }else{
                echo "<script>alert('Entrada no valida'); window.history.back();</script>";
            }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexion->prepare("SELECT * FROM plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $validacorreo = $row['correo'];
            if($validacorreo != '' ){
            require 'frontend/compatibilidad.php';
            }else{
                echo "<script>alert('Entrada no valida'); window.history.back();</script>";
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }


?>