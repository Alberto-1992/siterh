<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenuNew.css">
</head>

<body>

    <nav class="main-menu">
        <ul>
            <li>
                <a href="principalRh">
                    <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        HRAE IXTAPALUCA
                    </span>
                </a>
            </li>
            <hr>
            <?php
            if (isset($_SESSION['usuarioAdmin'])) {
            $usernameSesion = $_SESSION['usuarioAdmin']; ?>
            <hr>
            <li>
                <a href="../rh/principal">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="nav-text">
                        Evaluacion del desempeño
                    </span>
                </a>

            </li>
            <hr>
            <li>
                <a href="reclutamiento">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="nav-text">
                        Reclutamiento y Selección
                    </span>
                </a>

            </li>
            <hr>
            <li>
                <a href="../compatibilidad/principal">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span class="nav-text">
                        Compatiblidad laboral
                    </span>
                </a>

            </li>
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
            <?php
            }
    ?>
        </ul>

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

</html>