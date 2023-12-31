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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="js/scriptInicio.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Plataforma HRAEI</title>
</head>
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>
<script type="text/javascript">
/*
// Cantidad de copos de nieve
var snowMax = 60;

// Color de los copos
var snowColor = ["#BC955C", "#DDc9A3"];

// Forma de la nieve
var snowEntity = " ❄ ";

// Velocidad mientras cae
var snowSpeed = 0.85;

// Tamaño minimo de los copos
var snowMinSize = 9;

// Tamaño maximo de los copos
var snowMaxSize = 20;

// Velocidad de refrescamiento (en milliseconds)
var snowRefresh = 50;

// Estilo adicional
var snowStyles = "cursor: default; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;";



var snow = [],
	pos = [],
	coords = [],
	lefr = [],
	marginBottom,
	marginRight;

function randomise(range) {
	rand = Math.floor(range * Math.random());
	return rand;
}

function initSnow() {
	var snowSize = snowMaxSize - snowMinSize;
	marginBottom = document.body.scrollHeight - 5;
	marginRight = document.body.clientWidth - 15;

	for (i = 0; i <= snowMax; i++) {
		coords[i] = 0;
		lefr[i] = Math.random() * 15;
		pos[i] = 0.03 + Math.random() / 10;
		snow[i] = document.getElementById("flake" + i);
		snow[i].style.fontFamily = "inherit";
		snow[i].size = randomise(snowSize) + snowMinSize;
		snow[i].style.fontSize = snow[i].size + "px";
		snow[i].style.color = snowColor[randomise(snowColor.length)];
		snow[i].style.zIndex = 1000;
		snow[i].sink = snowSpeed * snow[i].size / 5;
		snow[i].posX = randomise(marginRight - snow[i].size);
		snow[i].posY = randomise(2 * marginBottom - marginBottom - 2 * snow[i].size);
		snow[i].style.left = snow[i].posX + "px";
		snow[i].style.top = snow[i].posY + "px";
	}

	moveSnow();
}

function resize() {
	marginBottom = document.body.scrollHeight - 5;
	marginRight = document.body.clientWidth - 15;
}

function moveSnow() {
	for (i = 0; i <= snowMax; i++) {
		coords[i] += pos[i];
		snow[i].posY += snow[i].sink;
		snow[i].style.left = snow[i].posX + lefr[i] * Math.sin(coords[i]) + "px";
		snow[i].style.top = snow[i].posY + "px";

		if (snow[i].posY >= marginBottom - 2 * snow[i].size || parseInt(snow[i].style.left) > (marginRight - 3 * lefr[i])) {
			snow[i].posX = randomise(marginRight - snow[i].size);
			snow[i].posY = 0;
		}
	}

	setTimeout("moveSnow()", snowRefresh);
}

for (i = 0; i <= snowMax; i++) {
	document.write("<span id='flake" + i + "' style='" + snowStyles + "position:absolute;top:-" + snowMaxSize + "'>" + snowEntity + "</span>");
}

window.addEventListener('resize', resize);
window.addEventListener('load', initSnow);
*/
</script>
<body style="background-color: #EBECED;">

    <style>
        a {
            text-decoration: none;
        }
    </style>
    <header class="header">
        <?php 
        //error_reporting(0);
        $path = "imagenesPerfiles/".$identificador;

        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img id='myImg' src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: -11px; '>";
                }else{
                
                }
            }
        }else{
            $path = "imagenesPerfiles/fotodefault";
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img id='myImg' src='imagenesPerfiles/fotodefault/perfil.jpg' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: -11px; '>";
                }else{
                    
                }
            }
        }
        clearstatcache();
        ?>
        <span id="cabecera">R.H</span>

    </header>
<style>
        #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.9); 
    
}

.modal-content {
    margin: auto;
    display: block;
    width: 100%;
    max-width: 550px;
    
}
#img01 {
    border-radius: 40px;
}
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
    
}

.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
    
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: white;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
        
    }
}
    </style>
    
    <div id="popUp" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" >
  <div id="caption"></div>
</div>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <?php
    if (isset($_SESSION['usuarioAdminRh'])) {
        require_once 'graficos/graficoCabeceraOperativo.php';
        require_once 'graficos/graficosCabecera.php';

        //require 'graficos/graficosCapturas.php';
    }else if(isset($_SESSION['usuarioDatos'])) {
        require_once 'graficos/graficoCabeceraOperativo.php';
        
    }else if(isset($_SESSION['usuarioJefe'])) {
        require_once 'graficos/graficoCabeceraOperativo.php';
        
    }
    ?>


    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require_once 'menu/menuPrincipal.php';
        ?>

<script>
                        function plantillaenfermeria() {
                            window.location.href='plantillaEnfermeria';
                        }
                        function plantillamedicos() {
                            window.location.href='plantillaMedicos';
                        }
                        function plantillabajas() {
                            window.location.href='plantillabajas';
                        }
                    </script>
        <article class="card" id="plantillaMedicos" onclick="plantillamedicos();" move="transform: translateY(-0)">
            <a href="plantillaMedicos">
            <hr id="hr6">
            <i class="fa fa-stethoscope" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla Medicos</p>
            </a>
</article>
<article class="card" id="mistrabajadores" onclick="plantillaenfermeria();">
            <a href="plantillaEnfermeria">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla enfermeria</p>
            </a>
</article>
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
            <article class="card" id="plantillamando" onclick="plantillabajas();">
                <a href="plantillabajas">
                    <hr id="hr6">
                    <i class="fa fa-users" aria-hidden="true" id="iconosdiv"></i>
                    <p>Bajas plantilla</p>
                </a>
            </article>
            <article class="card" id="compatibilidades" onclick="controlCompatibilidad();">
                <a href="controlCompatibilidad">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Control compatibilidades</p>
                </a>
            </article>
            <!--
            <article class="card" id="plantillamando" onclick="movimientosplantilla();">
                <a href="plantillamandos">
                    <hr id="hr6">
                    <i class="fa fa-users" aria-hidden="true" id="iconosdiv"></i>
                    <p>Movimientos plantilla</p>
                </a>
            </article>-->
                    
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Evaluación del Desempeño</p>
                </a>
            </article>
            <article class="card" id="estructura-organizacional" onclick="estructura();">
                <a href="../rh/admin2023">
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
            <!--
            <article class="card" id="relacioneslaborales" onclick="relacioneslaborales();">
                <a href="../relacioneslaborales/principal">
                    <hr id="hr6">
                    <i class="fa fa-briefcase" aria-hidden="true" id="iconosdiv"></i>
                    <p>Relaciones laborales</p>
                </a>
            </article>
                    -->
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
            require_once 'menu/menuPersonal.php';
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
                require_once 'conexionRh.php';
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
                <a href="plantillahraei">
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
                <a href="plantillahraei">
                    <hr id="hr6">
                    <i class="fa fa-user" aria-hidden="true" id="iconosdiv"></i>
                    <p>Plantilla HRAEI</p>
                </a>
            </article>
                <?php
                } else if ($admin == 'jacv_8810@hotmail.com') { ?>
                    
                    <article class="card" id="plantillaoperativo" onclick="plantillahraei();">
                <a href="plantillahraei">
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
            require_once 'menu/menuPersonal.php';
            
            require_once 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
                $statement->execute(array(
                    ':correo' => $usernameSesion
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'angelnurse73@hotmail.com') {
                    ?>
                    <script>
                        function plantillaenfermeria() {
                            window.location.href='plantillaEnfermeria';
                        }
                    </script>
<article class="card" id="mistrabajadores" onclick="plantillaenfermeria();">
            <a href="plantillaEnfermeria">
            <hr id="hr6">
            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla enfermeria</p>
            </a>
</article>
<?php }
        if($admin == 'rosmic23@hotmail.com'){ ?>
        <script>
        function plantillamedicos() {
                            window.location.href='plantillaMedicos';
                        }
                    </script>
        <article class="card" id="plantillaMedicos" onclick="plantillamedicos();">
            <a href="plantillaMedicos">
            <hr id="hr6">
            <i class="fa fa-stethoscope" aria-hidden="true" id="iconosdiv"></i>
                <p>Plantilla Medicos</p>
            </a>
        </article>
    <?php } ?>

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
                require_once 'conexionRh.php';
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
<!--
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
    -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
<?php
require_once 'modals/cargarImagenperfil.php';
?>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>

</script>
<script>
    var modal = document.getElementById('popUp');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</html>