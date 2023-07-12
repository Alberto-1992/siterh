<html>

<head>
    <style>
    
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="principal">
                    <i class="fa fa-hospital-o fa-2x"></i>
                    <span class="nav-text">
                        Principal
                    </span>
                </a>
            </li>
            <hr>
            <li class="has-subnav">
                <a href="infarto">
                    <i class="fa fa-bar-chart fa-2x"></i>
                    <span class="nav-text">
                        Graficos
                    </span>
                </a>
                <ul style="background: white">
                            <hr><li><a href="#" onclick="factoresriesgo();" id="nav-text">
                            <span class="nav-text">Factores de riesgo</span>
                            </a></li>
                            <hr><li><a href="#" onclick="angioplastiacoronaria();" id="nav-text">
                            <span class="nav-text">Angioplastia coronaria</span>
                            </a></li><hr>
                        </ul>
        </li>
    <hr>
    <li class="has-subnav">
                <a href="infarto">
                    <i class="fa fa-heartbeat fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        S.C.A
                    </span>
                </a>
                <!--<ul>
                    <li><a href="#" id="nav-text" data-toggle="modal" data-target="#graficos" onclick="graficos();">Graficos cancer de mama</a></li>
                </ul>-->
            </li>
    <hr>
            <li class="has-subnav">
                <a href="#" onclick="window.close();">
                    <i class="fa fa-window-close fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        Cerrar ventana
                    </span>
                </a>
                <!--<ul>
                    <li><a href="#" id="nav-text" data-toggle="modal" data-target="#graficos" onclick="graficos();">Graficos cancer de mama</a></li>
                </ul>-->
            </li>
    <hr>
</ul>
        <ul class="logout">
            <li>
                <a href="#">
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