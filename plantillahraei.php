<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $query = $conexionX->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'frontend/plantillahraei.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
                $statement = $conexionX->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'brendacontreras@hotmail.com' or $admin == 'oscar.rosasc@hotmail.com') {
        require 'frontend/plantillahraei.php';

        break;
                }

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
                $statement = $conexionX->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'msandoval@hraei.gob.mx' or $admin == 'isabella291216@gmail.com' or $admin == 'bramirez699@gmail.com' or $admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com' or $admin == 'jacv_8810@hotmail.com' or $admin == 'jbaldome@yahoo.com.mx' or $admin == 'adriana.zent@hotmail.com') {
        require 'frontend/plantillahraei.php';
        break;
                }
        default:
        
        require 'close_sesion.php';
        
        }
        
?>