<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdmin']):
            $usernameSesion = $_SESSION['usuarioAdmin']; 
            require 'aplicacion/abandonoPacienteCancerMama.php';
        
        break;
        
        case isset($_SESSION['residentes']):
            $usernameSesion = $_SESSION['residentes'];
            require 'aplicacion/abandonoPacienteCancerMama.php';
        break;

        case isset($_SESSION['usuarioMedico']):
            $usernameSesion = $_SESSION['usuarioMedico'];
            require 'aplicacion/abandonoPacienteCancerMama.php';
        break;
        
        default:
        
        require 'close_sesion.php';
        
        }
        
?>