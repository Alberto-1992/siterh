<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <title>Información empleado</title>

    
</head>
<body>
<div class="box1">
        <header class="headerinfarto" style="background-color: #0D6E87;color:white;">
        
            <span id="cabecera">Informacion de empleado.</span>

        </header>
        <style>
            a {
                text-decoration: none;
            }
        </style>
<?php
switch(true) {

    case isset($_SESSION['usuarioAdminRh']):
        require 'menu/menuPersonal.php';
    break;
    case isset($_SESSION['usuarioJefe']):
        require 'menu/menuPersonal.php';
    break;
    default:
        require 'close_sesion.php';
    } ?>
    <div class="gallery">
    <?php
//error_reporting(0);
    $id_empleado = base64_decode($_GET['id']);
        require 'clases/conexion.php';
        $conexion = new ConexionRh();

        $sql = $conexion->prepare("SELECT  plantillahraei.*, eventocapacitacion.id_evento,eventocapacitacion.Nombre_evento,eventocapacitacion.modalidad_actividades,eventocapacitacion.fecha_inicia,eventocapacitacion.fecha_termino,eventocapacitacion.horario_establecido,eventocapacitacion.anotedocumentos,eventocapacitacion.descripcionevento,eventocapacitacion.comentariojefe,eventocapacitacion.lugar_dondeimpar,eventocapacitacion.id_empleado as idempleadocapacitacion FROM eventocapacitacion inner join plantillahraei on plantillahraei.Empleado = eventocapacitacion.id_empleado WHERE eventocapacitacion.id_empleado= :id_empleado");
            $sql->execute(array(
                ':id_empleado'=>$id_empleado
            ));
            
        if(!empty($sql)){
            while($rw = $sql->fetch()){ 
                ?>
            
            <article class="card" id="autorizacioncapacitacion">
            <a href="autorizarSolicitudPermiso?id=<?php echo base64_encode($rw['id_evento']) ?>">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p><?php echo $rw['Nombre_evento'] ?></p>
            </a>
            </article>

            
<?php
            } 
        }?>

<!-- Vacaciones por empleado -->
<?php
//error_reporting(0);
    $id_empleado = base64_decode($_GET['id']);

        $sql = $conexion->prepare("SELECT  plantillahraei.*, vacaciones.id_vacaciones,vacaciones.fecha_inicio,vacaciones.fecha_fin,vacaciones.evento,vacaciones.id_empleado FROM vacaciones inner join plantillahraei on plantillahraei.Empleado = vacaciones.id_empleado WHERE plantillahraei.Empleado= :Empleado");
            $sql->execute(array(
                ':Empleado'=>$id_empleado
            ));
            
        if(!empty($sql)){
            while($rw = $sql->fetch()){ ?>
            
            <article class="card" id="autorizacioncapacitacion" onclick="misEmpleados();">
            <a href="autorizarVacaciones?id=<?php echo base64_encode($id_empleado) ?>">
            <hr id="hr6">
            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                <p><?php echo $rw['evento'].' Del: '.$rw['fecha_inicio'].' Al: '.$rw['fecha_fin'] ?></p>
            </a>
            </article>

            
<?php
            } 
        }?>
<!--Finaliza vacaciones por empleado-->
    
        <?php
        
        $sql = $conexion->prepare("SELECT  plantillahraei.*, eventocapacitacion.id_evento,eventocapacitacion.Nombre_evento,eventocapacitacion.modalidad_actividades,eventocapacitacion.fecha_inicia,eventocapacitacion.fecha_termino,eventocapacitacion.horario_establecido,eventocapacitacion.anotedocumentos,eventocapacitacion.descripcionevento,eventocapacitacion.comentariojefe,eventocapacitacion.ligar_dondeinpar,eventocapacitacion.id_empleado as idempleadocapacitacion, jefes.id_jefedeljefe, jefes.descripcionestructura3, datospersonales.telefonocelular FROM eventocapacitacion inner join plantillahraei on plantillahraei.Empleado = eventocapacitacion.id_empleado inner join jefes on jefes.id_empleadoJefe = eventocapacitacion.id_empleado inner join  datospersonales on datospersonales.id_empleado = eventocapacitacion.id_empleado WHERE jefes.id_empleadoJefe= :id_empleadoJefe");
            $sql->execute(array(
                ':id_empleadoJefe'=>$id_empleado
            ));
            if(!empty($sql)){
                while($rw = $sql->fetch()){ ?>
                
                    <article class="card" id="autorizacioncapacitacion" onclick="misEmpleados();">
                    <a href="autorizarSolicitudPermiso">
                    <hr id="hr6">
                    <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                        <p><?php echo $rw['Nombre_evento'] ?></p>
                    </a>
                    </article>
        
                    
        <?php
                    } ?>
                </div>
        </div>
                    <?php 
            }
        
        
        


?>
<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>