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
            header('location: calendario/index');
            }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                header('location: calendario/indexVista');
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                header('location: calendario/indexVista');
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>