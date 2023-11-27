<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
        $sql = $conexionX->prepare("SELECT Empleado, correo from plantillahraei where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $validaCorreo = $row['correo'];
            if($validaCorreo == $usernameSesion){
            $identificador = $row['Empleado'];
            require 'reportes/reporteCapacitacion.php';
            }
        break;
        
        default:
        
        require 'close_sesion.php';
        
        }
        
?>