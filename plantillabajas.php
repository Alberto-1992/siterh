<?php session_start();
require 'clases/conexion.php';
$conexionX = new ConexionRh();
switch(true) {

    case isset($_SESSION['usuarioAdminRh']):
        $usernameSesion = $_SESSION['usuarioAdminRh']; 
            $query = $conexionX->prepare("SELECT usuariosrh.correoelectronico, plantillahraei.Empleado from usuariosrh left outer join plantillahraei on plantillahraei.correo = usuariosrh.correoelectronico where usuariosrh.correoelectronico = :correoelectronico");
                $query->execute(array(
                    ':correoelectronico'=>$usernameSesion
                ));
                $row = $query->fetch();
                $valida = $row['correoelectronico'];
                $identificador = $row['Empleado'];
                if($valida == $usernameSesion){
        require 'frontend/plantillabajas.php';
                }else{
                    echo "<script>alert('No tienes acceso, no insistas');
                    window.history.back();</script>";
            }
    
    break;
    
    case isset($_SESSION['usuarioJefe']):
        $usernameSesion = $_SESSION['usuarioJefe'];
            $statement = $conexionX->prepare("SELECT Empleado, correo FROM plantillahraei WHERE correo= :correo");
            $statement->execute(array(
                ':correo' => $usernameSesion
            ));
            $rw = $statement->fetch();
            $admin = $rw['correo'];
            $identificador = $rw['Empleado'];
            if ($admin == 'brendacontreras@hotmail.com' or $admin == 'oscar.rosasc@hotmail.com' or $admin == 'bramirez699@gmail.com') {
    require 'frontend/plantillabajas.php';

    break;
        }

    default:
    
    require 'close_sesion.php';
    
    }
        
?>