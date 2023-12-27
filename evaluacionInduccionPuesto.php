<?php session_start();
error_reporting(0);
require 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            
                $query = $conexionX->prepare("SELECT correoelectronico from usuariosrh where correoelectronico = :correoelectronico");
                    $query->execute(array(
                        ':correoelectronico'=>$usernameSesion
                    ));
                    $row = $query->fetch();
                    $valida = $row['correoelectronico'];
                    if($valida == $usernameSesion){
            require 'evaluacionInduccion/index.php';
                    }else{
                        echo "<script>alert('No tienes acceso, no insistas');
                        window.history.back();</script>";
                    }
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'evaluacionInduccion/index.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            $sql = $conexionX->prepare("SELECT Empleado FROM plantillahraei where plantillahraei.correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            $identificador = $row['Empleado']; 
            $sqlIdent = $conexionX->prepare("SELECT id_Empleado FROM intoduccionpuesto where id_Empleado = :id_Empleado");
            $sqlIdent->execute(array(
                ':id_Empleado'=>$identificador
            ));
            $rowIdent = $sqlIdent->fetch();
            $validaId = $rowIdent['id_Empleado'];
            if($validaId == ''){
                    require 'evaluacionInduccion/index.php';
            }else{
                header('location: evaluacionInduccion/reportePDF?id='.$validaId);
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>