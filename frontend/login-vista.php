<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="UTF-8">
    <title>HRAEI IXTAPALUCA</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="icono/icono.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/estiloslogin.css?=1">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>

<body>
    <header style="width: auto; height: 2rem; padding: 4px; text-align: center; color: white; font-size: 17px; background: #B5B195; font-style:normal;">
        <p>Hospital Regional de Alta Especialidad de Ixtapaluca.</p>
    </header>

    <div class="form-bg">
        <div class="container">
            <div class="row">
                    <div class="form-container">
                        <form class="form-horizontal" method="post" autocomplete="off">
                            <h3 class="title">R.H</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="email" placeholder="Username" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                            <button class="btn signin" type="submit" >Log in</button>
                        
                            <span class="register"><a href="https://hraei.gob.mx/rH/recursos_humanos" target="_blank">Hospital Regional de Alta Especialidad de Ixtapaluca</a></span>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <footer style="width: 100%; height: 3rem; position: fixed; background: #B5B195; bottom: 0; color: white;  text-align: center;">
        <p>
            ® Hospital Regional de Alta Especialidad de Ixtapaluca, todos los derechos reservados. <br>
            Carr Federal México-Puebla Km. 34.5, Zoquiapan, 56530 Ixtapaluca, Méx.</p>
    </footer>
</body>
</html>
<?php session_start();
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $correo = $_POST['usuario'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    $bloqueado = 7;
    $bloqueadomando = 4;
include("clases/conexion.php");
$conexion = new ConexionRh();

    $statement = $conexion->prepare('SELECT correo, rol, password, eliminado FROM usuarioslogeo WHERE correo= :correo AND password = :password and rol = :rol and eliminado = :eliminado');
    $statement->execute(array(
        ':correo' => $correo,
        ':password' => $password,
        ':rol'=>$bloqueado,
        ':eliminado'=>0
    ));
    $resultado = $statement->fetch();
    if (!empty($resultado)){
        $_SESSION['usuarioDatos'] = $correo;
        header('location: principalRh');
    
    }

    
        $statement4 = $conexion->prepare('SELECT correo, rol, password, eliminado FROM usuarioslogeojefes WHERE correo= :correo AND password = :password and rol = :rol and eliminado = :eliminado');
        $statement4->execute(array(
            
            ':correo' => $correo,
            ':password' => $password,
            ':rol'=>$bloqueadomando,
            ':eliminado'=>0
        ));
        $resultado4 = $statement4->fetch();
        
            if ($resultado4 != false){
                $_SESSION['usuarioJefe'] = $correo;
        header('location: principalRh');
            
            
    }
        $sqlAdmin = $conexion->prepare('SELECT correoelectronico, claveacceso, rolacceso from usuariosrh where correoelectronico = :correoelectronico  AND claveacceso = :claveacceso and rolacceso = :rolacceso');

        $sqlAdmin->execute(array(
            
            ':correoelectronico' => $correo,
            ':claveacceso' => $password,
            ':rolacceso' =>8
        ));
    
        $rowAdmin = $sqlAdmin->fetch();
        
            if (!empty($rowAdmin)){
                $_SESSION['usuarioAdminRh'] = $correo;
                    header('location: principalRh');
            
    }
    
    echo "<script>alertify.error('Usuario o contraseña incorrectos');</script>";
                    }
?>