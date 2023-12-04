<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh'];
        $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            if($row != false){
            $identificador = $row['Empleado'];
            require 'frontend/validaDocumentacion.php';
            }else{
                $usernameSesion = $_SESSION['usuarioAdminRh'];
                $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
            require 'frontend/validaDocumentacion.php';
            }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $sql = $conexionX->prepare("SELECT correo,Empleado from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $mail = $row['correo'];
                if($mail == 'bramirez699@gmail.com'){
            require 'frontend/validaDocumentacion.php';
                }else{
                    echo "<script>alert('No tienes permisos de acceso asno');window.history.back();</script>";
                }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                if($identificador == 1983){
        require 'frontend/validaDocumentacion.php';
                }else{
                    echo "<script>alert('No tienes permisos de acceso asno');window.history.back();</script>";
                }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>