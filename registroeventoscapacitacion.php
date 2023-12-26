<?php session_start();
require 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
        $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $id_empleado = $row['Empleado'];
            if($id_empleado == 1983 or $id_empleado == 1240 or $id_empleado == 1184 or $id_empleado == 1169){
            $identificador = $row['Empleado'];
            require 'frontend/registroeventoscapacitacion.php';
            }
        break;
        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos']; 
        $sql = $conexionX->prepare("SELECT Empleado from plantillahraei where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $id_empleado = $row['Empleado'];
            if($id_empleado == 123){
            $identificador = $row['Empleado'];
            require 'frontend/registroeventoscapacitacion.php';
            }
        break;
        

        default:
        
        require 'close_sesion.php';
        
        }
        
?>