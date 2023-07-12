<?php session_start();
//error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $correo = $_POST['usuario'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    
include("conexionRh.php");

    $statement = $conexionRol->prepare('SELECT correo, rol, password, eliminado FROM usuarioslogeo WHERE correo= :correo AND password = :password and rol = :rol and eliminado = :eliminado'
    );
    $statement->execute(array(
        
        ':correo' => $correo,
        ':password' => $password,
        ':rol'=>7,
        ':eliminado'=>0
    ));

    $resultado = $statement->fetch();
    if ($resultado != false){
        $_SESSION['usuarioDatos'] = $correo;
        header('location: principalRh');
    
    }

    
        $statement4 = $conexionRol->prepare('SELECT correo, rol, password, eliminado FROM usuarioslogeojefes WHERE correo= :correo AND password = :password and rol = :rol and eliminado = :eliminado');
        $statement4->execute(array(
            
            ':correo' => $correo,
            ':password' => $password,
            ':rol'=>4,
            ':eliminado'=>0
        ));
        $resultado4 = $statement4->fetch();
        
            if ($resultado4 != false){
                $_SESSION['usuarioJefe'] = $correo;
        header('location: principalRh');
            
            
    }
        $sqlAdmin = $conexionRol->prepare('SELECT correoelectronico, claveacceso, rolacceso from usuariosrh where correoelectronico = :correoelectronico  AND claveacceso = :claveacceso and rolacceso = :rolacceso');

        $sqlAdmin->execute(array(
            
            ':correoelectronico' => $correo,
            ':claveacceso' => $password,
            ':rolacceso' =>8
        ));
    
        $rowAdmin = $sqlAdmin->fetch();
        
            if ($rowAdmin != false){
                $_SESSION['usuarioAdmin'] = $correo;
                    header('location: principalRh');
            
    }
    
        echo "<script>alert('Error de usuario o contraseña');</script>";
                    }

require 'frontend/login-vista.html';

?>