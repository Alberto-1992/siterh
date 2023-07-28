<?php session_start();
if (isset($_SESSION['usuarioDatos'])) {
    $usernameSesion = $_SESSION['usuarioDatos'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= '$usernameSesion' AND rol = 7 and eliminado = 0");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioDatos'] = $usernameSesion;
        require 'frontend/misCursos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else if (isset($_SESSION['usuarioAdminRh'])) {
    $usernameSesion = $_SESSION['usuarioAdminRh'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo, rol, password, numTrabajador FROM usuarioslogeo WHERE correo= '$usernameSesion' AND rol = 7 and eliminado = 0");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioAdminRh'] = $usernameSesion;
        require 'frontend/misCursos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else if (isset($_SESSION['usuarioJefe'])) {
    $usernameSesion = $_SESSION['usuarioJefe'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo, rol, password FROM usuarioslogeojefes WHERE correo= '$usernameSesion' and rol = 4 and eliminado = 0");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioJefe'] = $usernameSesion;
        require 'frontend/misCursos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else {
    header('location: index');
}
