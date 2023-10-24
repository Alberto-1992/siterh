<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
        $sql = $conexionX->prepare("SELECT Empleado, Nombre from plantillahraei where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            
            if($row != false){
            $identificador = $row['Empleado'];
            $nombre = $row['Nombre'];
            require 'frontend/planIndividualCapacitacion.php';
            }else{
                $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $sql = $conexionX->prepare("SELECT Empleado, Nombre from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $nombre = $row['Nombre'];
            require 'frontend/planIndividualCapacitacion.php';
            }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $sql = $conexionX->prepare("SELECT correo,Empleado, Nombre from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $mail = $row['correo'];
                $nombre = $row['Nombre'];
                
                if($mail == 'bramirez699@gmail.com'){
            require 'frontend/planIndividualCapacitacion.php';
                }else{
                    require 'frontend/planIndividualCapacitacion.php';
                }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexionX->prepare("SELECT Empleado, Nombre from plantillahraei where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $nombre = $row['Nombre'];
        require 'frontend/planIndividualCapacitacion.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>