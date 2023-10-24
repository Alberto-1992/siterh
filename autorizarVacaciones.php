<?php session_start();
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $id = $_GET['id'];
            header("location: calendarioVacaciones/indexVista?id=$id");
            
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $id = $_GET['id'];
            header("location: calendarioVacaciones/indexVista?id=$id");
        
        break;

        case isset($_SESSION['usuarioDatos']):
            $id = $_GET['id'];
            header("location: calendarioVacaciones/indexVista?id=$id");
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>