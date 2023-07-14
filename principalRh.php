<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh';
                $query = $conexionRh->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'frontend/principalRh.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insitas');
                        window.history.back();</script>";
                    }
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/principalRh.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/principalRh.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>