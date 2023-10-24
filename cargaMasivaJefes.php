<?php session_start();
switch(true) {

    case isset($_SESSION['usuarioAdminRh']):
        $usernameSesion = $_SESSION['usuarioAdminRh']; 
        
        require 'frontend/cargaMasivaJefes.php';
        
    break;
    
    case isset($_SESSION['usuarioJefe']):
        $usernameSesion = $_SESSION['usuarioJefe'];
        require 'frontend/cargaMasivaJefes.php';
    
    break;

    case isset($_SESSION['usuarioDatos']):
        $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/cargaMasivaJefes.php';
        
    break;

    default:
    
    require 'close_sesion.php';
    
    }
    ?>
