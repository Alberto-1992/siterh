<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
                $query = $conexionRh->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'frontend/plantillaMedicos.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'conexionRh.php';
                $query = $conexionRh->prepare("SELECT correo from plantillahraei where correo = :correo");
                    $query->execute(array(
                        ':correo'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correo'];
                    if($valida == 'rosmic23@hotmail.com'){
            require 'frontend/plantillaMedicos.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;

        default:
        
        require 'close_sesion.php';
        
        }
?>