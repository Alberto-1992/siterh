<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require 'frontend/enEvaluacion.php';
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/enEvaluacion.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/enEvaluacion.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>