<?php session_start();
error_reporting(0);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            
            require 'frontend/datosAcademicosVista.php';
            
        break;
        case isset($_SESSION['usuarioJefe']):
            $usernameSesion = $_SESSION['usuarioJefe']; 
            
            require 'frontend/datosAcademicosVista.php';
            
        break;
        
        require 'close_sesion.php';
        
        }


?>