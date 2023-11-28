<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $query = $conexionX->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'notificaciones/editarCursoEmpleado.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/documentacion.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/documentacion.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>
