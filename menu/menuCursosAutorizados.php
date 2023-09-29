<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenu.css">
</head>

<body>
<style>
    
    #hr {
        padding: 0px;
        margin: 0px;
    }
</style>
    <nav class="main-menu" style="margin-top: 0px;">
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
                <a href="principalCapacitacion">
                    <i class="fa fa-bar-chart fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
        </ul>
        <ul>
        <hr id="hr">
            <li>
                <a href="validaDocumentacionCursos">
                    <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Validacion de informacion de cursos
                    </span>
                </a>

            </li>
        </ul>
            <hr id="hr">
            <li>
                <a href="programaCapacitacion">
                    <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Plan anual de capacitacion
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
<script>
    function buscarpostulados() {
        $("#buscarpostulado").modal('show');
    }
</script>

</html>