<?php

if (isset($_POST['almacenar'])){
    
    $name= $_POST['name'];
    $correo= $_POST['correo'];
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $rolUser = $_POST['rol_acceso'];
    
    
    $password = hash('sha512', $password);
    $cpassword = hash('sha512', $cpassword);
} 
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
    try{
        $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexionX->beginTransaction();
        $statement = $conexionX->prepare("INSERT INTO usuariosrh (nombrecompleto, correoelectronico, claveacceso, rolacceso) VALUES (:nombrecompleto, :correoelectronico, :claveacceso, :rolacceso)");
        $statement->execute(array(
            
            ':nombrecompleto' => $name,
            ':correoelectronico' => $correo,
            ':claveacceso' => $password,
            'rolacceso' => $rolUser
        
        ));
    
        $validatransac = $conexionX->commit();

        if($validatransac != false) {
            echo "<script>alert('Datos registrados'); window.history.back();
</script>";
}
}catch(Exception $e) {
$conexionX->rollBack();
echo "<script>alert('Error inesperado');
</script>";
} 


?>