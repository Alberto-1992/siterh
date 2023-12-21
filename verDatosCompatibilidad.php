<?php session_start();
error_reporting(0);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            
            require 'frontend/datosCompatibilidad.php';
            
        break;
        
        require 'close_sesion.php';
        
        }


?>