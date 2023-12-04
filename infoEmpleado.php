<?php session_start();
require 'clases/conexion.php';
$conexion = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $query = $conexion->prepare("SELECT correoelectronico, id_empleado from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    $id_jefe = $row['id_empleado'];
                    if($valida == $usernameSesion){
            require 'frontend/infoEmpleado.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
                $statement = $conexion->prepare("SELECT correo, Empleado FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                $id_jefe = $rw['Empleado'];
                if ($admin != false) {
        require 'frontend/infoEmpleado.php';

        break;
                }


        default:
        
        require 'close_sesion.php';
        
        }
        
?>