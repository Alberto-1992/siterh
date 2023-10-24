<?php session_start();
error_reporting(0);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            
            require 'frontend/accesosMasivosReclutamiento.php';
            
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/accesosMasivosReclutamiento.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
            require 'frontend/accesosMasivosReclutamiento.php';
            
        break;

        default:
        
        require 'close_sesion.php';
        
        }


?>