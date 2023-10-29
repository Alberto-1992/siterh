<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualización datos academicos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<body>
<?php
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
