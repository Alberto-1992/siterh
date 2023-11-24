<?php session_start();

if(isset($_POST['Ingresar'])){
    $correo = $_POST['correo'];
    $pass = $_POST['claveAcceso'];
    $password = hash('sha512', $pass);

}
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    try{
        $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexionX->beginTransaction();
    $sql = $conexionX->prepare("SELECT correoelectronico, claveacceso from usuariosrh where correoelectronico = :correoelectronico and claveacceso = :claveacceso limit 1");
        $sql->execute(array(
            ':correoelectronico'=>$correo,
            ':claveacceso'=>$password
        ));

        $validatransac = $conexionX->commit();

        if($validatransac != false) {
            require 'frontend/registroFormUser.php';
}
}catch(Exception $e) {
$conexionX->rollBack();
echo "<script>alert('something was wrong');
window.history.back();</script>";
}
?>