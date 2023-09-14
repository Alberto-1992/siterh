<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenuNew.css">
</head>

<body>

    <nav class="main-menu">

        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-user fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        <?php
                        if (isset($_SESSION['usuarioAdminRh'])) {
                            $usernameSesion = $_SESSION['usuarioAdminRh'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT nombre, apellidopaterno FROM personaloperativo2023 WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            if($rw != false){
                            $nombre = $rw['nombre'];
                            $appaterno = $rw['apellidopaterno'];
                            echo $nombre.' '.$appaterno;
                            }else{
                                $usernameSesion = $_SESSION['usuarioAdminRh'];
                                require 'conexionRh.php';
                                $statement = $conexionRh->prepare("SELECT nombre FROM jefes2022 WHERE correo= :correo");
                                $statement->execute(array(
                                    ':correo' => $usernameSesion
                                ));
                                $rw = $statement->fetch();
                                $nombre = $rw['nombre'];
                                echo $nombre;  
                            }
                        } else if (isset($_SESSION['usuarioJefe'])) {
                            $usernameSesion = $_SESSION['usuarioJefe'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT nombre FROM jefes2022 WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            $nombre = $rw['nombre'];
                            echo $nombre;
                        }
                        ?>
                    </span>
                </a>
            </li>
        </ul>
        <ul>
            <?php
            if (isset($_SESSION['usuarioAdminRh'])) {
                $usernameSesion = $_SESSION['usuarioAdminRh']; ?>
                <li>
                    <a href="principalRh">
                        <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="../rh/principal">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="nav-text">
                            Evaluacion del desempeño
                        </span>
                    </a>

                </li>
                <hr>
                <li>
                    <a href="principalReclutamiento">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="nav-text">
                            Reclutamiento y Selección
                        </span>
                    </a>

                </li>
                <hr>

                <li>
                    <a href="../compatibilidad/principal">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <span class="nav-text">
                            Compatiblidad laboral
                        </span>
                    </a>

                </li>
                <hr>
                <li>
                    <a href="../contratacion/principal">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span class="nav-text">
                            Contratación
                        </span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="../relacioneslaborales/principal">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="nav-text">
                            Relaciones laborales
                        </span>
                    </a>
                </li>
                <hr>
                <?php
                error_reporting(0);
                require 'conexionRh.php';
                $query = $conexionRh->prepare("SELECT correo from usuarioslogeo where correo = :correo");
                $query->execute(array(
                    ':correo' => $usernameSesion
                ));
                $validar = $query->fetch();
                $validacorreo = $validar['correo'];
                if ($validacorreo == 'beto_1866@outlook.com' or $validacorreo == 'isabella291216@gmail.com' or $validacorreo == 'hfco.rosas@gmail.com') {
                ?>
                    <li>
                        <a href="validar" target="_blank">
                            <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                            <span class="nav-text">
                                Registrar usuario
                            </span>
                        </a>

                    </li>
                    <hr>
                    <li>
                        <a href="validarAdministradores" target="_blank">
                            <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                            <span class="nav-text">
                                Ver administradores
                            </span>
                        </a>

                    </li>
                    <hr>
                    <?php

                } else {
                    require 'conexionRh.php';
                    $query = $conexionRh->prepare("SELECT correo from usuarioslogeojefes where correo = :correo");
                    $query->execute(array(
                        ':correo' => $usernameSesion
                    ));
                    $validar = $query->fetch();
                    $validacorreo = $validar['correo'];
                    if ($validacorreo == 'beto_1866@outlook.com' or $validacorreo == 'isabella291216@gmail.com' or $validacorreo == 'hfco.rosas@gmail.com') {
                    ?>
                        <hr>
                        <li>
                            <a href="validar" target="_blank">
                                <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                                <span class="nav-text">
                                    Registrar usuario
                                </span>
                            </a>
                        </li>
                        <hr>
                    <li>
                        <a href="validarAdministradores" target="_blank">
                            <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                            <span class="nav-text">
                                Ver administradores
                            </span>
                        </a>

                    </li>
                <?php
                    }
                }
                ?>
                <hr>
            <?php
            }
            ?>
        </ul>
        <ul>
            <li>
                <a href="#" onclick="cargarFoto();">
                    <i class="fa fa-user-circle-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cambiar foto de perfil
                    </span>
                </a>
            </li>
        </ul>
        <hr>
        <ul class="logout">
            <li>
                <a href="close_sesion">
                    <i class="fa fa-power-off fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
            <hr>
        </ul>
    </nav>
</body>
<script>
    function cargarFoto() {
        $("#imagenperfil").modal('show');
    }
</script> 
</html>