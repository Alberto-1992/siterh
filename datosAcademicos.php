<?php session_start();
error_reporting(0);
switch(true) {

    case isset($_SESSION['usuarioAdminRh']):
        $usernameSesion = $_SESSION['usuarioAdminRh']; 
        require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT usuariosrh.*, plantillahraei.*, datospersonales.*, estudiosmediosup.* FROM usuariosrh inner join plantillahraei on plantillahraei.correo = usuariosrh.correoelectronico inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado inner join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado where usuariosrh.correoelectronico = :correoelectronico");
            $sql->execute(array(
                ':correoelectronico'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['id_empleado'];
            $validaid = $row['id_datopersonal'];
            
            if($validaid != ''){
                require 'frontend/insercionActualizarDatosAcademicos.php';
            }else if($validaid == ''){
                $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
                    $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado']; 
            
                require 'frontend/insercionDatosAcademicos.php';
            }

        
    break;
    
    case isset($_SESSION['usuarioJefe']):
        $usernameSesion = $_SESSION['usuarioJefe'];
        require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.*,estudiosmediosup.*, ultimogradoestudios.* FROM plantillahraei left join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado left join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado left join ultimogradoestudios on ultimogradoestudios.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado'];
            $validaid = $row['id_datopersonal'];
        
            if($validaid != ''){
                require 'frontend/insercionActualizarDatosAcademicos.php';
            }else if($validaid == ''){
                $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
                    $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado']; 
            
                require 'frontend/insercionDatosAcademicos.php';
            }
    
    break;

    case isset($_SESSION['usuarioDatos']):
        $usernameSesion = $_SESSION['usuarioDatos'];
        require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.*, estudiosmediosup.*, ultimogradoestudios.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado inner join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado inner join ultimogradoestudios on ultimogradoestudios.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado'];
            $validaid = $row['id_datopersonal'];
            
            if($validaid != ''){
                require 'frontend/insercionActualizarDatosAcademicos.php';
            }else if($validaid == ''){
                $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado']; 
        
                require 'frontend/insercionDatosAcademicos.php';
            }
    break;

    default:
    
    require 'close_sesion.php';
    
    }


?>