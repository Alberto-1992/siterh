<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdmin']):
            $usernameSesion = $_SESSION['usuarioAdmin']; 
            require 'frontend/principalRh.php';
        
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe'];
            require 'frontend/principalRh.php';
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $usernameSesion = $_SESSION['usuarioDatos'];
        require 'frontend/principalRh.php';
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>