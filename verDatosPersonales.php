<?php session_start();
error_reporting(0);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            
            require 'frontend/datosPersonalesVista.php';
            
        break;
        case isset($_SESSION['usuarioJefe']):
            
            require 'frontend/datosPersonalesVista.php';
            
        break;
        
        require 'close_sesion.php';
        
        }


?>