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
    <script defer src="https://app.embed.im/snow.js"></script>
    <title>Plataforma HRAEI</title>
</head>
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>
<script type="text/javascript">

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

/*
// Fin de la configuración
// ----------------------------------------
// No modifiques a partir de esta linea
*/

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

</script>
<body style="background-color: #EBF3F2;">

    <style>
        a {
            text-decoration: none;
        }
    </style>
    <header class="header" style="background-color: #03CAB1;">
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

        <span id="cabecera">Capacitación</span>

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
    width: 80%;
    max-width: 450px;
    
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
        include_once 'graficos/graficosCabeceraCapacitacion.php';
        include_once 'graficos/graficosPiesCapacitacion.php';

        //require 'graficos/graficosCapturas.php';
    } else if (isset($_SESSION['usuarioDatos'])) {
        $usernameSesion = $_SESSION['usuarioDatos'];
        require 'conexionRh.php';
        $statement = $conexionRh->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= :correo AND rol = :rol");
        $statement->execute(array(
            ':correo' => $usernameSesion,
            ':rol' => 7
        ));
        $rw = $statement->fetch();
        $admin = $rw['correo'];
        if ($admin == 'beto_1866@outlook.com') {
            include_once 'graficos/graficosCabeceraCapacitacion.php';
        }
    } else if (isset($_SESSION['usuarioJefe'])) {
        $usernameSesion = $_SESSION['usuarioJefe'];
        require 'conexionRh.php';
        $statement = $conexionRh->prepare("SELECT correo, rol, password FROM usuarioslogeojefes WHERE correo= :correo AND rol = :rol");
        $statement->execute(array(
            ':correo' => $usernameSesion,
            ':rol' => 4
        ));
        $rw = $statement->fetch();
        $admin = $rw['correo'];
        if ($admin == 'bramirez699@gmail.com') {
            include_once 'graficos/graficosCabeceraCapacitacion.php';
        }
    }
    ?>


    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require 'menu/menuPrincipal.php';
        ?>
<script src="notification.js"></script>
            <script>
                function reclutamiento() {
                    window.location.href = '';
                }

                function evaluacion() {
                    window.location.href = '';
                }

                function documentos() {
                    window.location.href = '';
                }

                function programacapacitacion() {
                    window.location.href = 'programaCapacitacion';
                }

                function validaciondedocumentacion() {
                    window.location.href='validaDocumentacionCursos';
                }
                function listaempleados() {
                    window.location.href='programaCursosAutorizadosEmpleados';
                }
                function creacionCursoCapacitacion() {
                    window.location.href ='creacionCursoCapacitacion';
                }
                function registroenventoscapacitacion() {
                            window.location.href = 'registroeventoscapacitacion';
                        }
                        function insercion_datos() {
                            window.location.href = 'cargaRegistroCapacitacion';
                        }
                        function busqueda() {
                            window.location.href='reportesCursos';
                        }
            </script>
            <?php
                    require_once 'clases/conexion.php';
                    $conexion = new ConexionRh();
                    $usernameSesion = $_SESSION['usuarioAdminRh'];
                    $statement = $conexion->prepare("SELECT correo FROM plantillahraei WHERE correo= :correo");
                    $statement->execute(array(
                        ':correo' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    $admin = $rw['correo'];
                    if ($admin == 'bramirez699@gmail.com' or $admin == 'beto_1866@outlook.com' or $admin == 'isabella291216@gmail.com' or $admin == 'hfco.rosas@gmail.com') { ?>
            <article class="card" id="creaciondecursos" onclick="creacionCursoCapacitacion();">
                <a href="creacionCursoCapacitacion" >
                    <hr id="hr6">
                    <i class="fa fa-cloud-upload" aria-hidden="true" id="iconosdiv"></i>
                    <p>Creación nuevo curso</p>
                    <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                </a>
            </article>
            <article class="card" id="cargaproveedor" onclick="insercion_datos();">
                <a href="cargaRegistroCapacitacion" >
                    <hr id="hr6">
                    <i class="fa fa-database" aria-hidden="true" id="iconosdiv"></i>
                    <p>Carga de datos de proveedor</p>
                    <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                </a>
            </article>
            <article class="card" id="busquedacurso" onclick="registroenventoscapacitacion();">
                <a href="registroeventoscapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-search" aria-hidden="true" id="iconosdiv"></i>
                    <p>Busqueda cursos capacitación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            </article>
            
            <article class="card" id="programacapacitacion" onclick="programacapacitacion();">
                <a href="programaCapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                    <p>Programa de capacitación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="validaciondocumentocapacitacion" onclick="validaciondedocumentacion();">
                <a href="validaDocumentacionCursos">
                    <hr id="hr6">
                    <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                    <p>Validación de documentación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
                    </article>
                
            <article class="card" id="validaciondocumentocapacitacion" onclick="busquedaReportes();">
                <a href="reportesCursos" target="_black">
                    <hr id="hr6">
                    <i class="fa fa-search" aria-hidden="true" id="iconosdiv"></i>
                    <p>Busqueda</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            
                    <?php  } 
               
                
            
                    //require 'graficos/graficosCapturas.php';
        } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuPersonal.php';

            ?>
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
                    if ($admin == 'beto_1866@outlook.com') {
                ?>
                        <script>
                            function reclutamiento() {
                                window.location.href = '';
                            }

                            function evaluacion() {
                                window.location.href = '';
                            }

                            function documentos() {
                                window.location.href = '';
                            }

                            function programacapacitacion() {
                                window.location.href = 'programaCapacitacion';
                            }

                            function validaciondedocumentacion() {
                                window.location.href = 'validaDocumentacionCursos'
                            }
                            function creacionCursoCapacitacion() {
                    window.location.href ='creacionCursoCapacitacion';
                }
                        </script>
                        <?php
                        if ($admin == 'claehf@hotmail.com' ){ ?>
            <article class="card" id="creaciondecursos" onclick="creacionCursoCapacitacion();">
                <a href="creacionCursoCapacitacion" >
                    <hr id="hr6">
                    <i class="fa fa-cloud-upload" aria-hidden="true" id="iconosdiv"></i>
                    <p>Creación nuevo curso</p>
                    <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                </a>
            </article>
            <?php } ?>
                        <article class="card" id="creaciondecursos" onclick="creaciondecursos();">
                            <a href="reclutamiento">
                                <hr id="hr6">
                                <i class="fa fa-cloud-upload" aria-hidden="true" id="iconosdiv"></i>
                                <p>Creación de nuevo curso/capacitación</p>
                                <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                            </a>
                        </article>

                        <article class="card" id="busquedacursoempleado" onclick="listaempleados();">
                            <a href="documentacion">
                                <hr id="hr6">
                                <i class="fa fa-search-plus" aria-hidden="true" id="iconosdiv"></i>
                                <p>Busqueda cursos empleado</p>
                                <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                            </a>
                        </article>
                        <article class="card" id="programacapacitacion" onclick="programacapacitacion();">
                            <a href="programaCapacitacion">
                                <hr id="hr6">
                                <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                                <p>Programa de capacitación</p>
                                <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                            </a>
                        </article>
                        <article class="card" id="validaciondocumentocapacitacion" onclick="validaciondedocumentacion();">
                            <a href="validaDocumentacionCursos">
                                <hr id="hr6">
                                <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                                <p>Validación de documentación</p>
                                <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                            </a>
                        </article>
                    <?php
                    } ?>


                <?php

                }
            } else if (isset($_SESSION['usuarioJefe'])) {
                require 'menu/menuPersonal.php';

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
                    <script>
                        function reclutamiento() {
                            window.location.href = '';
                        }

                        function evaluacion() {
                            window.location.href = '';
                        }

                        function documentos() {
                            window.location.href = '';
                        }

                        function programacapacitacion() {
                            window.location.href = 'programaCapacitacion';
                        }

                        function validaciondedocumentacion() {
                            window.location.href = 'validaDocumentacionCursos'
                        }
                    </script>
                    <article class="card" id="creaciondecursos" onclick="creaciondecursos();">
                        <a href="reclutamiento">
                            <hr id="hr6">
                            <i class="fa fa-cloud-upload" aria-hidden="true" id="iconosdiv"></i>
                            <p>Creación de nuevo curso/capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="busquedacursoempleado" onclick="listaempleados();">
                        <a href="documentacion">
                            <hr id="hr6">
                            <i class="fa fa-search-plus" aria-hidden="true" id="iconosdiv"></i>
                                <p>Busqueda cursos empleado</p>
                            <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                        </a>
                    </article>
                    <article class="card" id="programacapacitacion" onclick="programacapacitacion();">
                        <a href="programacapacitacion">
                            <hr id="hr6">
                            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                            <p>Programa de capacitación</p>
                            <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                        </a>
                    </article>
                    <article class="card" id="validaciondocumentocapacitacion" onclick="validaciondedocumentacion();">
                        <a href="validaDocumentacionCursos">
                            <hr id="hr6">
                            <i class="fa fa-check" aria-hidden="true" id="iconosdiv"></i>
                            <p>Validación de documentación</p>
                            <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
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
                    <option value="2023-01-01:2023-12-31">Todo el año</option>
                    <option value="2023-01-01:2023-03-31">Enero-Marzo</option>
                    <option value="2023-04-01:2023-06-30">Abril-Junio</option>
                    <option value="2023-07-01:2023-09-30">Julio-Agosto</option>
                    <option value="2023-10-01:2023-12-31">Septiembre-Diciembre</option>
                </select>
            </div>
            <div id="resultado"></div>
        </div>
        <?php
        //require 'graficos/graficosCapturas.php';
    } else if (isset($_SESSION['usuarioDatos'])) {
        $usernameSesion = $_SESSION['usuarioDatos'];
        require 'conexionRh.php';
        $statement = $conexionRh->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= :correo AND rol = :rol");
        $statement->execute(array(
            ':correo' => $usernameSesion,
            ':rol' => 7
        ));
        $rw = $statement->fetch();
        $admin = $rw['correo'];
        if ($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com') {
        ?>

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
                        <option value="2023-01-01:2023-12-31">Todo el año</option>
                        <option value="2023-01-01:2023-03-31">Enero-Marzo</option>
                        <option value="2023-04-01:2023-06-30">Abril-Junio</option>
                        <option value="2023-07-01:2023-09-30">Julio-Agosto</option>
                        <option value="2023-10-01:2023-12-31">Septiembre-Diciembre</option>
                    </select>
                </div>
                <div id="resultado"></div>
            </div>

    <?php
        }
    }
    ?>
    -->
    <script>
        function estado() {

            let status = $("#buscar").val();
            let ob = {
                status: status
            };
            $.ajax({
                type: "POST",
                url: "consultadataTableReclutamiento.php",
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