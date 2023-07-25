<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenu.css">
</head>

<body>
    <script>
function graficosEvaluacion() {
    $.ajax({

        url: "graficos/graficoEvaluacionMetas.php",


        success: function (data) {

            $("#tabla_resultado").html(data);
        }

    });
}
function graficosDM() {
    $.ajax({

        url: "graficos/graficoDireccionMedica.php",


        success: function (data) {

            $("#tabla_resultado").html(data);
        }

    });
}
function graficosDAF() {
    $.ajax({

        url: "graficos/graficoDireccionDeAdmonFinanzas.php",


        success: function (data) {

            $("#tabla_resultado").html(data);
        }

    });
}
function graficosDO() {
    $.ajax({

        url: "graficos/graficoDireccionDeOperaciones.php",


        success: function (data) {

            $("#tabla_resultado").html(data);
        }

    });
}
function graficosDEyP() {
    $.ajax({

        url: "graficos/graficoDireccionDeEnsenanzaPlaneacion.php",


        success: function (data) {

            $("#tabla_resultado").html(data);
        }

    });
}
</script>
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
                <a href="#" onclick="graficosEvaluacion();">
                    <i class="fa fa-user-md fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dirección General
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="#" onclick="graficosDM();">
                    <i class="fa fa-heartbeat fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dirección Medica
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="#" onclick="graficosDAF();">
                    <i class="fa fa-cc-visa fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dirección de Administración y Finanzas
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="#" onclick="graficosDO();">
                    <i class="fa fa-bar-chart fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dirección de Operaciones
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="#" onclick="graficosDEyP();">
                    <i class="fa fa-address-book-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dirección de planeación y Enseñanza
                    </span>
                </a>

            </li>
        </ul>
        <hr id="hr">
        <ul>
            <li>
                <a href="graficoCompetencias">
                    <i class="fa fa-user-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Competencias 2022
                    </span>
                </a>

            </li>
        </ul>
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

</html>