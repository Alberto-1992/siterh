<?php session_start();
require 'clases/conexion.php';
$conexion = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $query = $conexion->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'contra/index.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            $statement = $conexion->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
        $statement->execute(array(
            ':correo' => $usernameSesion
        ));
        $rw = $statement->fetch();
        $admin = $rw['correo'];
        if ($admin == 'brendacontreras@hotmail.com') {
            require 'contra/index.php';
        }
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $statement = $conexion->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
            $statement->execute(array(
                ':correo' => $usernameSesion
            ));
            $rw = $statement->fetch();
            $admin = $rw['correo'];
            if ($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com') {
                require 'contra/index.php';
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>