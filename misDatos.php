<?php session_start();
if (isset($_SESSION['usuarioDatos'])) {
    $usernameSesion = $_SESSION['usuarioDatos'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo, rol FROM usuarioslogeo WHERE correo= '$usernameSesion' AND rol = 7");
    $statement->execute(array(
        ':correo_electronico' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioDatos'] = $usernameSesion;
        require 'frontend/misDatos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else if (isset($_SESSION['usuarioAdminRh'])) {
    $usernameSesion = $_SESSION['usuarioAdminRh'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= '$usernameSesion' AND rol_acceso = 5");
    $statement->execute(array(
        ':correo_electronico' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioAdminRh'] = $usernameSesion;
        require 'frontend/misDatos.php';
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
        require 'frontend/misDatos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else if (isset($_SESSION['usuarioMedico'])) {
    $usernameSesion = $_SESSION['usuarioMedico'];
    require '../cisfa/conexion.php';
    $statement = $conexion->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= '$usernameSesion' and rol = 9 and eliminado = 0");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    if ($rw != false) {
        $_SESSION['usuarioMedico'] = $usernameSesion;
        require 'frontend/misDatos.php';
    } else {
        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
        require 'close_sesion.php';
    }
} else {
    header('location: index');
}
