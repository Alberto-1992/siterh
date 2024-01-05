<?php session_start();
require 'clases/conexion.php';
$conexion = new ConexionRh();
$id = base64_decode($_GET['id']);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
                $query = $conexion->prepare("SELECT * from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $rw = $query->fetch();
                    $valida = $rw['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'reporteBecatiempo/ReporteEve.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
                $statement = $conexion->prepare("SELECT plantillahraei.*, jefes.id_empleadoJefe, jefes.id_jefedeljefe, jefes.descripcionestructura3, datospersonales.telefonocelular,eventocapacitacion.* FROM plantillahraei inner join jefes on jefes.id_empleadoJefe = plantillahraei.Empleado inner join  datospersonales on datospersonales.id_empleado = plantillahraei.Empleado inner join eventocapacitacion on eventocapacitacion.id_empleado = plantillahraei.Empleado WHERE plantillahraei.correo = :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == $usernameSesion) {
        require 'reporteBecatiempo/ReporteEve.php';
    }else{
        echo "<script>alert('No tienes acceso, no insistas');
        </script>";
    }
        break;
                

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
                $statement = $conexion->prepare("SELECT  plantillahraei.*, personaloperativo2023.id_empleado, personaloperativo2023.id_jefe, personaloperativo2023.descripcionestructura3, datospersonales.telefonocelular,eventocapacitacion.*, horariosplantilla.Turno, horariosplantilla.Jornada, horariosplantilla.Horario FROM plantillahraei left outer join personaloperativo2023 on personaloperativo2023.id_empleado = plantillahraei.Empleado left outer join  datospersonales on datospersonales.id_empleado = plantillahraei.Empleado left outer join eventocapacitacion on eventocapacitacion.id_empleado = plantillahraei.Empleado left outer join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado WHERE plantillahraei.correo= :correo and eventocapacitacion.id_evento = :id_evento");
                $statement->execute(array(
                    ':correo' => $usernameSesion,
                    ':id_evento'=>$id
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == $usernameSesion) {
        require 'reporteBecatiempo/ReporteEve.php';
    }else{
        echo "<script>alert('No tienes acceso, no insistas');
        window.history.back();</script>";
    }
        break;
                
        default:
        
        require 'close_sesion.php';
        
        }
        
?>