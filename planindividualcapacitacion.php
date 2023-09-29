<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT id_empleado, nombre, apellidopaterno, apellidomaterno from personaloperativo2023 where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            
            if($row != false){
            $identificador = $row['id_empleado'];
            $nombre = $row['nombre'];
                $appaterno = $row['apellidopaterno'];
                $apmaterno = $row['apellidomaterno'];
            require 'frontend/planIndividualCapacitacion.php';
            }else{
                $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
                $sql = $conexionRh->prepare("SELECT id_jefe, nombre from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
                $nombre = $row['nombre'];
                $appaterno = $row['apellidopaterno'];
                $apmaterno = $row['apellidomaterno'];
            require 'frontend/planIndividualCapacitacion.php';
            }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT correo,id_jefe, nombre from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
                $mail = $row['correo'];
                $nombre = $row['nombre'];
                
                if($mail == 'bramirez699@gmail.com'){
            require 'frontend/planIndividualCapacitacion.php';
                }else{
                    require 'frontend/planIndividualCapacitacion.php';
                }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_empleado, nombre, apellidopaterno, apellidomaterno from personaloperativo2023 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_empleado'];
                $nombre = $row['nombre'];
                $appaterno = $row['apellidopaterno'];
                $apmaterno = $row['apellidomaterno'];
        require 'frontend/planIndividualCapacitacion.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>