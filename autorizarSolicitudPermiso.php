<?php session_start();
error_reporting(0);
    switch(true) {
        case isset($_SESSION['usuarioJefe']):
            $id = base64_decode($_GET['id']);
            require_once 'clases/conexion.php';
                            $conexionX = new ConexionRh();
                            $id = base64_decode($_GET['id']);
                            $statement = $conexionX->prepare("SELECT  plantillahraei.*, personaloperativo2023.id_empleado, personaloperativo2023.id_jefe, personaloperativo2023.descripcionestructura3, datospersonales.telefonocelular, eventocapacitacion.* FROM eventocapacitacion inner join plantillahraei on plantillahraei.Empleado = eventocapacitacion.id_empleado inner join personaloperativo2023 on personaloperativo2023.id_empleado = plantillahraei.Empleado inner join  datospersonales on datospersonales.id_empleado = plantillahraei.Empleado WHERE eventocapacitacion.id_evento= :id_evento");
                $statement->execute(array(
                    ':id_evento' =>$id
                ));
                                $rw = $statement->fetch();
                            $id_empleado = $rw['Empleado'];
                                if($id_empleado != ''){
            require "frontend/autoizarSolicitudBeca.php";
                                }
        
        break;

        default:
        
        require 'close_sesion.php';
        
        }


?>