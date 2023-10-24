<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
        $sql = $conexionX->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            if($row != false){
            $identificador = $row['id_empleado'];
            require 'frontend/principalCapacitacion.php';
            }else{
                $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $sql = $conexionX->prepare("SELECT id_jefe from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
            require 'frontend/principalCapacitacion.php';
            }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $sql = $conexionX->prepare("SELECT correo,id_jefe from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
                $mail = $row['correo'];
                if($mail == 'bramirez699@gmail.com'){
            require 'frontend/principalCapacitacion.php';
                }else{
                    require '';
                }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexionX->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_empleado'];
        require 'frontend/principalCapacitacion.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>