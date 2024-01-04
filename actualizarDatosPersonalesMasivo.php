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
            require 'frontend/actualizarDatosPersonalesMasivo.php';
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>