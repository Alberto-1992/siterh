<?php session_start();
//error_reporting(0);
switch(true) {

    case isset($_SESSION['usuarioAdminRh']):
        $usernameSesion = $_SESSION['usuarioAdminRh']; 
        require 'clases/conexion.php';
        $conexion = new ConexionRh();
        $sql = $conexion->prepare("SELECT usuariosrh.*, plantillahraei.*, datospersonales.*, t_estado.estado as entidadnacimi FROM usuariosrh inner join plantillahraei on plantillahraei.correo = usuariosrh.correoelectronico inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado  left join t_estado on t_estado.id_estado = datospersonales.entidadnacimiento where usuariosrh.correoelectronico = :correoelectronico");
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
        require 'clases/conexion.php';
        $conexion = new ConexionRh();
        $sql = $conexion->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
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
                $sql = $conexion->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
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
        require 'clases/conexion.php';
        $conexion = new ConexionRh();
        $sql = $conexion->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
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
                $sql = $conexion->prepare("SELECT * FROM plantillahraei where plantillahraei.correo = :correo");
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