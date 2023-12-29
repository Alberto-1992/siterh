<?php session_start();
require 'clases/conexion.php';
$conexion = new ConexionRh();
$usernameSesion = $_SESSION['usuarioAdminRh']; 
    $sql = $conexion->prepare("UPDATE usuariosrh set logueado = :logueado where correoelectronico = :correoelectronico");
        $sql->execute(array(
            ':logueado'=>0,
            ':correoelectronico'=>$usernameSesion
        ));
$_SESSION = array();
session_destroy();
    header('location: index');
exit;
?>