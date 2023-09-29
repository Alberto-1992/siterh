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
                        }else if (isset($_SESSION['usuarioDatos'])) {
                            $usernameSesion = $_SESSION['usuarioDatos'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT nombre, apellidopaterno FROM personaloperativo2023 WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            $nombre = $rw['nombre'];
                            $appaterno = $rw['apellidopaterno'];
                            echo $nombre.' '.$appaterno;
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
                    <a href="principalCapacitacion">
                        <i class="fa fa-bar-chart fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                </li>
                <hr>
            <?php
            }else if (isset($_SESSION['usuarioDatos'])) {
            ?>
            <li>
                    <a href="principalRh">
                        <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr>
            <?php }else if (isset($_SESSION['usuarioJefe'])) { ?>
                <li>
                    <a href="principalRh">
                        <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr>
                <?php } ?>
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