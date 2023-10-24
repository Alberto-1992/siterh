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
    <title>Actualización datos personales</title>

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
            $sql = $conexionRh->prepare("SELECT usuariosrh.*, plantillahraei.*, datospersonales.*, t_estado.estado as entidadnacimi FROM usuariosrh inner join plantillahraei on plantillahraei.correo = usuariosrh.correoelectronico inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado  left join t_estado on t_estado.id_estado = datospersonales.entidadnacimiento where usuariosrh.correoelectronico = :correoelectronico");
                $sql->execute(array(
                    ':correoelectronico'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_empleado'];
                $validaid = $row['id_datopersonal'];
                $nss = $row['NSS'];
                $banco = $row['NombreBanco'];
                $cuenta = $row['CuentaClabe'];
                $nacionalidad = $row['nacionalidad'];
                $calle = $row['calle'];
                $numexte = $row['numeroexterior'];
                $numint = $row['numerointerior'];
                $cp = $row['codigopostal'];
                $colonia = $row['colonia'];
                $telcasa = $row['telefonocasa'];
                $telcel = $row['telefonocelular'];
                $fechanacimiento = $row['fechanacimiento'];
                $edad = $row['edad'];
                $sexo = $row['genero'];
                $tiposangre = $row['tipodesangre'];
                $nombreemergencia = $row['nombreemergencia'];
                $telefonoemergencia = $row['telefonoemergencia'];
                $parentezcoemergencia = $row['parentescoemergencia'];
                $otrotel = $row['otrotelefono'];
                $localidad = $row['localidad'];
                $numerocartillamilitar = $row['numerocartillamilitar'];
                $cartanaturalizacion = $row['cartanaturalizacion'];
                $estado = $row['estado'];
                $municipio = $row['municipio'];
                $nacimiento = $row['entidadnacimi'];
                $identidadnacimiento = $row['entidadnacimiento'];
                if($validaid != ''){
                    require 'frontend/insercionActualizarDatosPersonales.php';
                }

            
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $validaid = $row['id_datopersonal'];
                $nss = $row['NSS'];
                $banco = $row['NombreBanco'];
                $cuenta = $row['CuentaClabe'];
                $nacionalidad = $row['nacionalidad'];
                $calle = $row['calle'];
                $numexte = $row['numeroexterior'];
                $numint = $row['numerointerior'];
                $cp = $row['codigopostal'];
                $colonia = $row['colonia'];
                $telcasa = $row['telefonocasa'];
                $telcel = $row['telefonocelular'];
                $fechanacimiento = $row['fechanacimiento'];
                $edad = $row['edad'];
                $sexo = $row['genero'];
                $tiposangre = $row['tipodesangre'];
                $nombreemergencia = $row['nombreemergencia'];
                $telefonoemergencia = $row['telefonoemergencia'];
                $parentezcoemergencia = $row['parentescoemergencia'];
                $otrotel = $row['otrotelefono'];
                $localidad = $row['localidad'];
                $numerocartillamilitar = $row['numerocartillamilitar'];
                $cartanaturalizacion = $row['cartanaturalizacion'];
                $estado = $row['estado'];
                $municipio = $row['municipio'];
                if($validaid != ''){
                    require 'frontend/insercionActualizarDatosPersonales.php';
                }else if($validaid == ''){
                    $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
                        $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado']; 
                $nss = $row['NSS'];
                $banco = $row['NombreBanco'];
                $cuenta = $row['CuentaClabe'];
                $nacionalidad = $row['nacionalidad'];
                    require 'frontend/insercionDatosPersonales.php';
                }
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado'];
                $validaid = $row['id_datopersonal'];
                $nss = $row['NSS'];
                $banco = $row['NombreBanco'];
                $cuenta = $row['CuentaClabe'];
                $nacionalidad = $row['nacionalidad'];
                $calle = $row['calle'];
                $numexte = $row['numeroexterior'];
                $numint = $row['numerointerior'];
                $cp = $row['codigopostal'];
                $colonia = $row['colonia'];
                $telcasa = $row['telefonocasa'];
                $telcel = $row['telefonocelular'];
                $fechanacimiento = $row['fechanacimiento'];
                $edad = $row['edad'];
                $sexo = $row['genero'];
                $tiposangre = $row['tipodesangre'];
                $nombreemergencia = $row['nombreemergencia'];
                $telefonoemergencia = $row['telefonoemergencia'];
                $parentezcoemergencia = $row['parentescoemergencia'];
                $otrotel = $row['otrotelefono'];
                $localidad = $row['localidad'];
                $numerocartillamilitar = $row['numerocartillamilitar'];
                $cartanaturalizacion = $row['cartanaturalizacion'];
                $estado = $row['estado'];
                $municipio = $row['municipio'];
                if($validaid != ''){
                    require 'frontend/insercionActualizarDatosPersonales.php';
                }else if($validaid == ''){
                    $sql = $conexionRh->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['Empleado']; 
                $nss = $row['NSS'];
                $banco = $row['NombreBanco'];
                $cuenta = $row['CuentaClabe'];
                $nacionalidad = $row['nacionalidad'];
                    require 'frontend/insercionDatosPersonales.php';
                }
        break;

        default:
        
        require 'close_sesion.php';
        
        }


?>
