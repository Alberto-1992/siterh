<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="principal">
                    <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        HRAE IXTAPALUCA
                    </span>
                </a>
            </li>

            <li class="has-subnav">
                <a href="datosUsuario">
                    <i class="fa fa-user fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Mis Datos
                    </span>
                </a>
            </li>
            <hr>
            <li class="has-subnav">
                <a href="infarto">
                    <i class="fa fa-heartbeat" aria-hidden="true"></i>
                    <span class="nav-text">
                        Sindrome Coronario Agudo
                    </span>
                </a>
                <!--<ul>
                            <li><a href="#" id="nav-text" data-toggle="modal"
                    data-target="#myModal_cargamedicamento">Cargar paciente</a></li>
                    </ul>-->
            </li>

            <li class="has-subnav">
                <a href="cancer">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span class="nav-text">
                        Cáncer
                    </span>
                </a>
                <!--<ul>
                    <li><a href="#" id="nav-text" data-toggle="modal" data-target="#graficos" onclick="graficos();">Graficos cancer de mama</a></li>

                </ul>-->
            </li>
            <li class="has-subnav">
                <a href="clinicas">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span class="nav-text">
                        Clinicas
                    </span>
                </a>
            </li>

            <hr>
            <li class="has-subnav">
                <a href="artritis">
                    <i class="fa fa-hand-spock-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Artritis
                    </span>
                </a>


                <hr>
            <li class="has-subnav">
                <a href="Economia">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span class=" nav-text">
                        Economía de la Salud
                    </span>
                </a>

            </li>

            <!--  <ul>
                            <li><a href="#" id="nav-text" data-toggle="modal"
                    data-target="#myModal_cargamedicamento">Cargar paciente</a></li>
                    </ul>-->
            </li>

            <!--
                <li class="has-subnav">
                    <a href="vistaCisfa.php">
                    <i class="fa fa-medkit fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Cisfa
                        </span>
                    </a>
                    <ul>
                            <li><a href="#" id="nav-text">Farmacia Intrahosp.</a></li>
                            <li><a href="#" id="nav-text">Farmacia Gratuita</a></li>
                            <li><a href="#" id="nav-text">Promociones</a></li>
                            <li><a href="#" id="nav-text">Fotos 20x30</a></li> 
                            <li><a href="#" id="nav-text">Lozas</a></li>
                            <li><a href="#" id="nav-text">Lápidas</a></li>
                            <li><a href="#" id="nav-text">Promociones</a></li>
                            <li><a href="#" id="nav-text">Fotos 20x30</a></li> 
                    </ul>
                </li>
                -->
            <li class="has-subnav">
                <a href="lupus">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <span class=" nav-text">
                        Lupus
                    </span>
                </a>

            </li>

            <li>
                <a href="#">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                    <span class="nav-text">
                        Hemodinamia
                    </span>
                </a>

            </li>
            <hr>
            <!-- <li>
                <a href="#">
                    <i class="fa fa-wheelchair-alt fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Rehabilitación
                    </span>
                </a>
                <ul>
                            <li><a href="#" id="nav-text">Lozas</a></li>
                            <li><a href="#" id="nav-text">Lápidas</a></li>
                            <li><a href="#" id="nav-text">Promociones</a></li>
                            <li><a href="#" id="nav-text">Fotos 20x30</a></li> 
                    </ul>
            </li>-->
            <?php
            if (isset($_SESSION['usuarioAdmin'])) {
            $usernameSesion = $_SESSION['usuarioAdmin'];
            require '../cisfa/conexion.php';
            $statement = $conexion->prepare("SELECT correo_electronico, clave_acceso, rol_acceso from login where correo_electronico = :correo_electronico AND rol_acceso = :rol_acceso");
            $statement->execute(array(
                ':correo_electronico' => $usernameSesion,
                ':rol_acceso'=>5
            ));
            $rw = $statement->fetch();
            $admin = $rw['correo_electronico'];
            if ($admin == 'infobeto92@gmail.com' or $admin == 'beto_1866@outlook.com') {
                ?>
            <li>
                <a href="#">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span class=" nav-text">
                        Evaluación del Desempeño
                        </span>
                </a>
                <!--<ul>
                            <li><a href="#" id="nav-text">Lozas</a></li>
                            <li><a href="#" id="nav-text">Lápidas</a></li>
                            <li><a href="#" id="nav-text">Promociones</a></li>
                            <li><a href="#" id="nav-text">Fotos 20x30</a></li> 
                    </ul>-->
            </li>

            <li>
                <a href="../bolsa/principal">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="nav-text">
                        Reclutamiento y Selección
                    </span>
                </a>

            </li>

            <li>
                <a href="validar" target="_blank">
                    <i class="fa fa-id-card fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Registrar usuario
                    </span>
                </a>
                <!--
                <ul>
                    <li><a href="#" id="nav-text">Lozas</a></li>
                    <li><a href="#" id="nav-text">Lápidas</a></li>
                    <li><a href="#" id="nav-text">Promociones</a></li>
                    <li><a href="#" id="nav-text">Fotos 20x30</a></li>
                </ul>
-->
            </li>
                <?php
            }
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
        </ul>
    </nav>
</body>

</html>