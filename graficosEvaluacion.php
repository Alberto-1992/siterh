<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
        $sql = $conexionRh->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
            $sql->execute(array(
                ':correo'=>$usernameSesion
            ));
            $row = $sql->fetch();
            if($row != false){
            $identificador = $row['id_empleado'];
            require 'frontend/graficosEvaluacion.php';
            }else{
                $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'conexionRh.php';
                $sql = $conexionRh->prepare("SELECT id_jefe from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
            require 'frontend/graficosEvaluacion.php';
            }
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>