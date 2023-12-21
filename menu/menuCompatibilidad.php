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
            if(isset($_SESSION['usuarioAdminRh'])) {
                $usernameSesion = $_SESSION['usuarioAdminRh'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT Nombre FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $nombre = $rw['Nombre'];
                echo $nombre;
            }
                ?>
                    </span>
                </a>
            </li>
        </ul>
        <hr id="hr">
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
        <hr id="hr">
        <li>
                    <a href="principalRh">
                        <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr id="hr">
        <ul class="logout">
            <li>
                <a href="close_sesion">
                    <i class="fa fa-power-off fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</body>
<script>
    function cargarFoto() {
        $("#imagenperfil").modal('show');
    }
</script>
</html>