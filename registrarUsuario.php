<?php session_start();

if(isset($_POST['Ingresar'])){
    $correo = $_POST['correo'];
    $pass = $_POST['claveAcceso'];
    $password = hash('sha512', $pass);

}
    require 'conexionRh.php';
    try{
        $conexionRh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionRh->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexionRh->beginTransaction();
    $sql = $conexionRh->prepare("SELECT correoelectronico, claveacceso from usuariosrh where correoelectronico = :correoelectronico and claveacceso = :claveacceso limit 1");
        $sql->execute(array(
            ':correoelectronico'=>$correo,
            ':claveacceso'=>$password
        ));

        $validatransac = $conexionRh->commit();

        if($validatransac != false) {
            require 'frontend/registroFormUser.php';
}
}catch(Exception $e) {
$conexionRol->rollBack();
echo "<script>alert('something was wrong');
window.history.back();</script>";
}



?>