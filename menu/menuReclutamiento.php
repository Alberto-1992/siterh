<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenu.css">
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
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="#" onclick="buscarpostulados();">
                    <i class="fa fa-search fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Buscar postulados
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="principalReclutamiento">
                    <i class="fa fa-bar-chart fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="reclutamiento">
                    <i class="fa fa-user-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Postulados
                    </span>
                </a>

            </li>
        </ul>
        <ul>
            <hr id="hr">
            <li>
                <a href="enEvaluacion">
                    <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Pre selección
                    </span>
                </a>

            </li>
        </ul>
        <ul>
            <hr id="hr">
            <li>
                <a href="documentacion">
                    <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Documentaión
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
                <li>
                <a href="accesosMasivosReclutamiento" target="_blank">
                    <i class="fa fa-desktop fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cargar masiva accesos
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
    function buscarpostulados() {
        $("#buscarpostulado").modal('show');
    }
</script>

</html>