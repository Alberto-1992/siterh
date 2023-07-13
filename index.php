<?php session_start();
    if(isset($_SESSION['usuarioDatos'])) {
        header('location: principalRh'); 
        
    }elseif(isset($_SESSION['usuarioAdminRh'])){
        header('location: principalRh');
    }elseif(isset($_SESSION['usuarioJefe'])){
        header('location: principalRh');
    }else{
    header('location: login');
    }

?>