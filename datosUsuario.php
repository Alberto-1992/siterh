<?php session_start();
    if(isset($_SESSION['usuarioDatos'])){
            $usernameSesion = $_SESSION['usuarioDatos'];
            require '../cisfa/conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= '$usernameSesion' AND rol_acceso = 9");
                    $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                            $_SESSION['usuarioDatos'] = $usernameSesion;
                            require 'frontend/datosUsuario.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                            require 'close_sesion.php';
                    }
    }else if(isset($_SESSION['usuarioAdminRh'])){
        $usernameSesion = $_SESSION['usuarioAdminRh'];
            require '../cisfa/conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= '$usernameSesion' AND rol_acceso = 5");
                    $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                            $_SESSION['usuarioAdminRh'] = $usernameSesion;
                            require 'frontend/datosUsuario.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                            require 'close_sesion.php';
                    }
    }else{
        header ('location: index');
    }
        
?>