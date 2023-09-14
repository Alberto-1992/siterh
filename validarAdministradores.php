<?php session_start();
    error_reporting(0);
    if(isset($_SESSION['usuario'])){
        require 'frontend/validar.php';
    }elseif(isset($_SESSION['usuarioAdminRh'])){
        $usernameSesion = $_SESSION['usuarioAdminRh'];
        
        if($usernameSesion == 'beto_1866@outlook.com' or $usernameSesion == 'isabella291216@gmail.com' or $usernameSesion == 'hfco.rosas@gmail.com'){
        require 'frontend/verAdministradores.php';
        }else{
            echo "<script>alert('No cuentas con acceso a este apartado');
            window.close()</script>";
        }
    
    }else{
        header ('location: principalRh');
    }
        
?>