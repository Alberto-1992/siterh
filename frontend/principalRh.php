<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link href="css/estilosMenuNew.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Plataforma HRAEI</title>
</head>

<body>

<style>
        a {
            text-decoration: none;
        }
        
</style>
<header class="header">
<span id="cabecera">R.H</span>
        <?php
                                $path = "imagenesPerfiles/".$identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; '>";
                                        }
                                    }
                                }
                                clearstatcache();
                                ?>
                            
</header>

<div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
                require 'menu/menuPrincipal.php';
        ?>
                
                <script>
                
                    function evaluacion() {
                        window.location.href='../rh/principal';
                    }
                    function reclutamiento() {
                        window.location.href='reclutamiento';
                    }
                    function compatibilidad() {
                        window.location.href='../compatibilidad/principal';
                    }
                
                    function estructura() {
                        window.location.href='../rh/admin';
                    }
                    function contratacion() {
                        window.location.href='../contratacion/principal';
                    }
                    function relacioneslaborales() {
                        window.location.href='../laborales/principal';
                    }
                
                    
                </script>
                
                <article class="card" id="evaluacion" onclick="evaluacion();">
                    <a href="../rh/principal">
                        <hr id="hr6">
                        <p>Evaluación del Desempeño</p>
                        <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                    </a>
                </article>

                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr7">
                        <p>Reclutamiento y Selección</p>
                        <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                    </a>
                </article>

                <article class="card" id="compatibilidad" onclick="compatibilidad();">
                    <a href="../compatibilidad/principal">
                        <hr id="hr7">
                        <p>Compatibilidad Laboral</p>
                        <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                    </a>
                </article>
                <article class="card" id="contratacion" onclick="contratacion();">
                    <a href="../contratacion/principal">
                        <hr id="hr7">
                        <p>Contratación</p>
                        <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                    </a>
                </article>
                <article class="card" id="relacioneslaborales" onclick="relacioneslaborales();">
                    <a href="../relacioneslaborales/principal">
                        <hr id="hrestructura-organizacional">
                        <p>Relaciones laborales</p>
                        <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                    </a>
                </article>
                <article class="card" id="estructura-organizacional" onclick="estructura();">
                    <a href="../rh/admin">
                        <hr id="hrestructura-organizacional">
                        <p>Módulo Usuarios</p>
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
                <a href="mantenimiento">
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
                    window.location.href='../rh/principal';
                }
                function misDatos() {
                    window.location.href='mantenimiento';
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
                    ':rol'=>7
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'msandoval@hraei.gob.mx' or $admin == 'isabella291216@gmail.com' or $admin == 'bramirez@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <p>Modulo usuarios</p>

                            <a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>
                        </a>
                    </article>
                    
            <?php
                }else if($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com'){
                ?>
                <script>
                    function reclutamiento() {
                        window.location.href='reclutamiento';
                    }
                </script>
                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr7">
                        <p>Reclutamiento y Selección</p>
                        <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
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
                    window.location.href='../rh/principal';
                }
                function misDatos() {
                    window.location.href='mantenimiento';
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
                <a href="mantenimiento">
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
                    ':rol'=>4
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <p>Modulo usuarios</p>

                            <a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>
                        </a>
                    </article>
                <?php

                }else if($admin == 'brendacontreras@hotmail.com'){
                    ?>
                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr7">
                        <p>Reclutamiento y Selección</p>
                        
                    </a>
                </article>
            <?php
                }
            }
        }
            ?>

        </div>
    </body>
    <?php
require 'modals/cargarImagenperfil.php';
    ?>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
</html>