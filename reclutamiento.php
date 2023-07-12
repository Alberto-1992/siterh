<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdmin']):
            $usernameSesion = $_SESSION['usuarioAdmin']; 
            require 'frontend/reclutamiento.php';
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/reclutamiento.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/reclutamiento.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>