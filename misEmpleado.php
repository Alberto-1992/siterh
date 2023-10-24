<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
                $query = $conexionRh->prepare("SELECT correoelectronico, id_empleado from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    $id_jefe = $row['id_empleado'];
                    if($valida == $usernameSesion){
            require 'frontend/misEmpleado.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo, Empleado FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                $id_jefe = $rw['Empleado'];
                if ($admin != false) {
        require 'frontend/misEmpleado.php';

        break;
                }


        default:
        
        require 'close_sesion.php';
        
        }
        
?>