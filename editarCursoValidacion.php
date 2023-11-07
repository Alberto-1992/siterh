<?php session_start();
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $usernameSesion = $_SESSION['usuarioAdminRh']; 
            require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $id = $_POST['id'];
$query = $conexionX->prepare("SELECT *
from datos where id = :id");
$query->execute(array(
    ':id'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaEditaDocumentacion.php';
}else{

}
        
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>