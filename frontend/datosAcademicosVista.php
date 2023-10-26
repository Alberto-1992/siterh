<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualización datos academicos</title>

    <!-- Bootstrap core CSS -->
</head>
<body>
<?php
error_reporting(0);
    $correo = $_POST['correo'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.*, estudiosmediosup.*, ultimogradoestudios.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado inner join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado inner join ultimogradoestudios on ultimogradoestudios.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                $sql->execute(array(
                    ':correo'=>$correo
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $validaid = $row['id_datopersonal'];
                
                if($validaid != ''){
                    require 'frontend/insercionActualizarDatosAcademicosVista.php';
                }else if($validaid == ''){
                    $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
                $sql->execute(array(
                    ':correo'=>$correo
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado']; 
            
                    require 'frontend/insercionDatosAcademicosVista.php';
                }


?>