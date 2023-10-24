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
    <script type="text/javascript" src="js/scriptInicio.js"></script>
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
        <?php /*
        $path = "imagenesPerfiles/" . $identificador;
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: -11px; '>";
                }
            }
        }
        clearstatcache();*/
        ?>
        <span id="cabecera">R.H</span>

    </header>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <?php
    if (isset($_SESSION['usuarioAdminRh'])) {
        require 'graficos/graficoCabeceraOperativo.php';
        require 'graficos/graficosCabecera.php';

        //require 'graficos/graficosCapturas.php';
    }else if(isset($_SESSION['usuarioDatos'])) {
        require 'graficos/graficoCabeceraOperativo.php';
        
    }else if(isset($_SESSION['usuarioJefe'])) {
        require 'graficos/graficoCabeceraOperativo.php';
        
    }
    ?>


    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require 'menu/menuPrincipal.php';
        ?>

            <script>
                
            </script>
            <article class="card" id="mistrabajadores" onclick="misEmpleados();">
            <a href="misEmpleado">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p>Mis trabajadores</p>
            </a>
            </article>
            <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillahraei">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
            <article class="card" id="plantillamando" onclick="movimientosplantilla();">
                <a href="plantillamandos">
                    <hr id="hr6">
                    <i class="fa fa-users" aria-hidden="true" id="iconosdiv"></i>
                    <p>Movimientos plantilla</p>
                </a>
            </article>
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Evaluación del Desempeño</p>
                </a>
            </article>
            <article class="card" id="estructura-organizacional" onclick="estructura();">
                <a href="../rh/admin">
                    <hr id="hr6">
                    <i class="fa fa-desktop" aria-hidden="true" id="iconosdiv"></i>
                    <p>Control Eval Desemp.</p>
                </a>
            </article>
            <article class="card" id="graficosevaluacion" onclick="graficosCapturas();">
                <a href="graficosEvaluacion">
                    <hr id="hr6">
                    <i class="fa fa-bar-chart" aria-hidden="true" id="iconosdiv"></i>
                    <p>Graficos de evaluación</p>
                </a>
            </article>
            
            <article class="card" id="reclutamiento" onclick="reclutamiento();">
                <a href="principalReclutamiento">
                    <hr id="hr6">
                    <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                    <p>Reclutamiento y Selección</p>
                </a>
            </article>

            <article class="card" id="compatibilidad" onclick="compatibilidadUsuarios();">
                <a href="compatibilidadusuarios">
                    <hr id="hr6">
                    <i class="fa fa-cogs" aria-hidden="true" id="iconosdiv"></i>
                    <p>Compatibilidad Laboral</p>
                </a>
            </article>
            <article class="card" id="contratacion" onclick="contratacion();">
                <a href="contratacion">
                    <hr id="hr6">
                    <i class="fa fa-newspaper-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Contratación</p>
                </a>
            </article>
            <article class="card" id="relacioneslaborales" onclick="relacioneslaborales();">
                <a href="../relacioneslaborales/principal">
                    <hr id="hr6">
                    <i class="fa fa-briefcase" aria-hidden="true" id="iconosdiv"></i>
                    <p>Relaciones laborales</p>
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="datosAcademicos">
                    <hr id="hr6">
                    <i class="fa fa-folder-open" aria-hidden="true" id="iconosdiv"></i>
                    <p>Datos academicos</p>
                </a>
            </article>
            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="actualizacionDatosPersonales">
                    <hr id="hr6">
                    <i class="fa fa-drivers-license" aria-hidden="true" id="iconosdiv"></i>
                    <p>Mis datos personales</p>
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="principalCapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-address-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Capacitación y cursos</p>
                </a>
            </article>
            <article class="card" id="calendarioVacaciones" onclick="vacaciones();">
                <a href="calendarioVacaciones">
                    <hr id="hr6">
                    <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                    <p>Planeación vacaciones</p>
                </a>
            </article>
        <?php

        } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuPersonal.php';
        ?>
        

            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="actualizacionDatosPersonales">
                    <hr id="hr6">
                    <i class="fa fa-drivers-license" aria-hidden="true" id="iconosdiv"></i>
                    <p>Mis datos personales</p>
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="datosAcademicos">
                    <hr id="hr6">
                    <i class="fa fa-folder-open" aria-hidden="true" id="iconosdiv"></i>
                    <p>Datos academicos</p>
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacionprograma();">
                <a href="programaCapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-address-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Capacitación y cursos</p>
                </a>
            </article>
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Evaluación del Desempeño</p>
                </a>
            </article>
            <article class="card" id="compatibilidad" onclick="compatibilidadUsuarios();">
                <a href="compatibilidadusuarios">
                    <hr id="hr6">
                    <i class="fa fa-cogs" aria-hidden="true" id="iconosdiv"></i>
                    <p>Compatibilidad Laboral</p>
                </a>
            </article>
            <article class="card" id="calendarioVacaciones" onclick="vacaciones();">
                <a href="calendarioVacaciones">
                    <hr id="hr6">
                    <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                    <p>Planeación vacaciones</p>
                </a>
            </article>
            <?php
                $usernameSesion = $_SESSION['usuarioDatos'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'msandoval@hraei.gob.mx' or $admin == 'isabella291216@gmail.com' or $admin == 'bramirez699@gmail.com') {
            ?>
        
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <i class="fa fa-desktop" aria-hidden="true" id="iconosdiv"></i>
                            <p>Modulo usuarios</p>

                            <a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>
                        </a>
                    </article>
                    <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillaoperativos">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>

                <?php
                } else if ($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com') {
                ?>
                    
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="principalReclutamiento">
                            <hr id="hr6">
                            <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                            <p>Reclutamiento y Selección</p>
                        </a>
                    </article>
                    <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillaoperativos">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
                <?php
                } else if ($admin == 'jacv_8810@hotmail.com') { ?>
                    
                    <article class="card" id="compatibilidad" onclick="compatibilidad();">
                        <a href="compatibilidad">
                            <hr id="hr6">
                            <i class="fa fa-cogs" aria-hidden="true" id="iconosdiv"></i>
                            <p>Compatibilidad Laboral</p>
                        </a>
                    </article>
                    <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillaoperativos">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
            <?php
            }else if($admin == 'jbaldome@yahoo.com.mx' or $admin == 'adriana.zent@hotmail.com') {
                ?>
                    <article class="card" id="contratacion" onclick="contratacion();">
            <a href="contratacion">
                <hr id="hr6">
                <i class="fa fa-newspaper-o" aria-hidden="true" id="iconosdiv"></i>
                <p>Contratación</p>
            </a>
        </article>
        <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
            <a href="plantillahraei">
                <hr id="hr6">
                <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla HRAEI</p>
            </a>
        </article>
        <?php
                }
            
        } else if (isset($_SESSION['usuarioJefe'])) {
            require 'menu/menuPersonal.php';
            ?>
            <article class="card" id="mistrabajadores" onclick="misEmpleados();">
            <a href="misEmpleado">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p>Mis trabajadores</p>
            </a>
            </article>
            <article class="card" id="evaluacion" onclick="evaluacion();">
            <a href="../rh/principal">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p>Evaluación del Desempeño</p>
            </a>
            </article>
            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="actualizacionDatosPersonales">
                    <hr id="hr6">
                    <i class="fa fa-drivers-license" aria-hidden="true" id="iconosdiv"></i>
                    <p>Mis datos personales</p>
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="datosAcademicos">
                    <hr id="hr6">
                    <i class="fa fa-folder-open" aria-hidden="true" id="iconosdiv"></i>
                    <p>Datos academicos</p>
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacionprograma();">
                <a href="programaCapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-address-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Capacitación y cursos</p>
                </a>
            </article>
            <article class="card" id="compatibilidad" onclick="compatibilidadUsuarios();">
                <a href="compatibilidadusuarios">
                    <hr id="hr6">
                    <i class="fa fa-cogs" aria-hidden="true" id="iconosdiv"></i>
                    <p>Compatibilidad Laboral</p>
                </a>
            </article>
            <article class="card" id="calendarioVacaciones" onclick="vacaciones();">
                <a href="calendarioVacaciones">
                    <hr id="hr6">
                    <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                    <p>Planeación vacaciones</p>
                </a>
            </article>
            <?php

                $usernameSesion = $_SESSION['usuarioJefe'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo ");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="capacitacion" onclick="capacitacion();">
                        <a href="principalCapacitacion">
                            <hr id="hr6">
                            <i class="fa fa-address-book" aria-hidden="true" id="iconosdiv"></i>
                            <p>Capacitación y cursos</p>
                        </a>
                    </article>
                    <article class="card" id="contratacion" onclick="contratacion();">
                <a href="contratacion">
                    <hr id="hr6">
                    <i class="fa fa-newspaper-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Contratación</p>
                </a>
            </article>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <i class="fa fa-desktop" aria-hidden="true" id="iconosdiv"></i>
                            <p>Módulo Usuarios</p>
                        </a>
                    </article>
                    <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillaoperativos">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
                <?php

                } else if ($admin == 'brendacontreras@hotmail.com') {
                ?>
                
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="principalReclutamiento">
                            <hr id="hr6">
                            <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                            <p>Reclutamiento y Selección</p>

                        </a>
                    </article>
                    
            <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillaoperativos">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
            <?php
            }else if($admin == 'oscar.rosasc@hotmail.com' ) {
                ?>
                
                    <article class="card" id="contratacion" onclick="contratacion();">
            <a href="contratacion">
                <hr id="hr6">
                <i class="fa fa-newspaper-o" aria-hidden="true" id="iconosdiv"></i>
                <p>Contratación</p>
            </a>
        </article>
        <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
            <a href="plantillahraei">
                <hr id="hr6">
                <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla HRAEI</p>
            </a>
        </article>
        <?php
                
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