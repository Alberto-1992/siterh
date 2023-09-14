<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Plataforma HRAEI</title>
</head>

<body style="background-color: #EBECED;">

    <style>
        a {
            text-decoration: none;
        }
    </style>
    <header class="header">
        <?php
        $path = "imagenesPerfiles/" . $identificador;
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: -11px; '>";
                }
            }
        }
        clearstatcache();
        ?>
        <span id="cabecera">R.H</span>

    </header>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <?php
    if (isset($_SESSION['usuarioAdminRh'])) {
        include_once 'graficos/graficosCabecera.php';

        //require 'graficos/graficosCapturas.php';
    } ?>


    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require 'menu/menuPrincipal.php';
        ?>

            <script>
                function evaluacion() {
                    window.location.href = '../rh/principal';
                }

                function reclutamiento() {
                    window.location.href = 'principalReclutamiento';
                }

                function capacitacion() {
                    window.location.href = 'principalCapacitacion';
                }

                function compatibilidad() {
                    window.location.href = '../compatibilidad/principal';
                }

                function estructura() {
                    window.location.href = '../rh/admin';
                }

                function contratacion() {
                    window.location.href = '../contratacion/principal';
                }

                function relacioneslaborales() {
                    window.location.href = '../laborales/principal';
                }

                function graficosCapturas() {
                    window.open('graficosEvaluacion');
                }
            </script>

            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <p>Evaluación del Desempeño</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="graficosevaluacion" onclick="graficosCapturas();">
                <a href="graficosEvaluacion">
                    <hr id="hr6">
                    <p>Graficos de evaluación</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="estructura-organizacional" onclick="estructura();">
                <a href="../rh/admin">
                    <hr id="hr6">
                    <p>Módulo Usuarios</p>
                    <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                </a>
            </article>
            <article class="card" id="reclutamiento" onclick="reclutamiento();">
                <a href="principalReclutamiento">
                    <hr id="hr6">
                    <p>Reclutamiento y Selección</p>
                    <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                </a>
            </article>

            <article class="card" id="compatibilidad" onclick="compatibilidad();">
                <a href="../compatibilidad/principal">
                    <hr id="hr6">
                    <p>Compatibilidad Laboral</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="contratacion" onclick="contratacion();">
                <a href="../contratacion/principal">
                    <hr id="hr6">
                    <p>Contratación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="relacioneslaborales" onclick="relacioneslaborales();">
                <a href="../relacioneslaborales/principal">
                    <hr id="hr6">
                    <p>Relaciones laborales</p>
                    <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="principalCapacitacion">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
        <?php

        } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuPersonal.php';

        ?>
            <script>
                function evaluacion() {
                    window.location.href = '../rh/principal';
                }

                function misDatos() {
                    window.location.href = 'mantenimiento';
                }

                function compatibilidad() {
                    window.location.href = '../compatibilidad/principal';
                }
            </script>

            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Mis datos personales</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <p>Evaluación del Desempeño</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>

            <?php
            if (isset($_SESSION['usuarioDatos'])) {
                $usernameSesion = $_SESSION['usuarioDatos'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= :correo AND rol = :rol");
                $statement->execute(array(
                    ':correo' => $usernameSesion,
                    ':rol' => 7
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'msandoval@hraei.gob.mx' or $admin == 'isabella291216@gmail.com' or $admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <p>Modulo usuarios</p>

                            <a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>
                        </a>
                    </article>

                <?php
                } else if ($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com') {
                ?>
                    <script>
                        function reclutamiento() {
                            window.location.href = 'principalReclutamiento';
                        }
                    </script>
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="principalReclutamiento">
                            <hr id="hr6">
                            <p>Reclutamiento y Selección</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                <?php
                } else if ($admin == 'jacv_8810@hotmail.com') { ?>

                    <article class="card" id="compatibilidad" onclick="compatibilidad();">
                        <a href="../compatibilidad/principal">
                            <hr id="hr6">
                            <p>Compatibilidad Laboral</p>
                            <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                        </a>
                    </article>
            <?php
                }
            }
        } else if (isset($_SESSION['usuarioJefe'])) {
            require 'menu/menuPersonal.php';
            ?>
            <script>
                function evaluacion() {
                    window.location.href = '../rh/principal';
                }

                function misDatos() {
                    window.location.href = 'mantenimiento';
                }

                function estructura() {
                    window.location.href = '../rh/admin';
                }
            </script>
            <article class="card" id="evaluacion" onclick="evaluacion();">

                <hr id="hr6">
                <p>Evaluación del Desempeño</p>
                <!--<a id="link" href="../rh/principal" class="btn btn-secondary">Evaluar</a>-->
            </article>
            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Mis datos personales</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="principalCapacitacion">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <?php
            if (isset($_SESSION['usuarioJefe'])) {

                $usernameSesion = $_SESSION['usuarioJefe'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo, rol FROM usuarioslogeojefes WHERE correo= :correo AND rol = :rol");
                $statement->execute(array(
                    ':correo' => $usernameSesion,
                    ':rol' => 4
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <p>Módulo Usuarios</p>
                            <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                        </a>
                    </article>
                <?php

                } else if ($admin == 'brendacontreras@hotmail.com') {
                ?>
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="principalReclutamiento">
                            <hr id="hr6">
                            <p>Reclutamiento y Selección</p>

                        </a>
                    </article>
                <?php

                } else if ($admin == 'bramirez699@gmail.com') {
                ?>
                    <script>
                        function capacitacion() {
                            window.location.href = 'principalCapacitacion';
                        }
                    </script>
                    <article class="card" id="capacitacion" onclick="capacitacion();">
                        <a href="principalCapacitacion">
                            <hr id="hr6">
                            <p>Capacitación y cursos</p>
                            <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                        </a>
                    </article>
        <?php
                }
            }
        }
        ?>

    </div>
    <?php
    if (isset($_SESSION['usuarioAdminRh'])) { ?>
        <style>
            tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;

            }

            td {
                cursor: pointer;
                font-size: 12px;
            }

            td:hover {
                background-color: black;
                color: white;
            }
        </style>

        <div class="tablaBuscador">
            <div class="col-md-2">
                <strong id="titleSeleccion">Seleccione:</strong>
                <select name="seleccion" id="buscar" class="form-control" onchange="estado();">
                    <option selected>Seleccione</option>
                    <option value="1">Autorizados</option>
                    <option value="2">Pendiente de VoBo</option>
                    <option value="3">Rechazadas</option>
                    <option value="4">Sin captura</option>
                </select>
            </div>
            <div id="resultado"></div>
        </div>
    <?php
        //require 'graficos/graficosCapturas.php';
    } ?>
    <script>
        function estado() {

            let status = $("#buscar").val();
            let ob = {
                status: status
            };
            $.ajax({
                type: "POST",
                url: "consultadataTable.php",
                data: ob,
                beforeSend: function() {
                    $('#resultado').html(
                        '<div id="resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                    );
                },
                success: function(data) {
                    $("#resultado").html(data);
                    //$("#editarDatosPersonalescancerdeMama").modal('show');
                }
            });

        };
    </script>

</body>
<?php
require 'modals/cargarImagenperfil.php';
?>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>

</script>

</html>