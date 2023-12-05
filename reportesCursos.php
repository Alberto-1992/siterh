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
            $id = $row['Empleado'];
            if($id == 1983 or $id == 1240 or $id == 1184 or $id == 1169){
            $identificador = $row['Empleado'];
            require 'frontend/reportesCursos.php';
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>