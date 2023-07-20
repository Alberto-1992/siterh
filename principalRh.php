<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['id_empleado'];
            require 'frontend/principalRh.php';
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_jefe from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
            require 'frontend/principalRh.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_empleado'];
        require 'frontend/principalRh.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>