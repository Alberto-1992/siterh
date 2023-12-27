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
<body style="background-color: #EBF3F2;">

    <style>
        a {
            text-decoration: none;
        }
        
    </style>
    <header class="header" style="background-color: #03CAB1;">
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
        clearstatcache(); */
        ?>
        <span id="cabecera">Capacitacion</span>

    </header>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

 

    <div class="gallery">
        
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require 'menu/menuCapacitacion.php';
        ?>

<script>
                        function solicitudpermisoadministrativo() {
                            window.location.href = 'solicitudpermisoadministrativo';
                        }
                        function evaluacion() {
                            window.location.href = '';
                        }
                        function planindividualcapacitacion() {
                            window.location.href = 'planindividualcapacitacion';
                        }
                        function capacitacionuseranual() {
                            window.location.href = 'capacitacionuseranual';
                        }
                        function formatoInduccionInstitucional() {
                            window.location.href = 'evaluacionInduccionPuesto'
                        }
                    </script>
                    <article class="card" id="creaciondecursos" onclick="capacitacionuseranual();">
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Programa anual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="planindividualcapacitacion" onclick="planindividualcapacitacion();">
                <a href="planindividualcapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-bookmark" aria-hidden="true" id="iconosdiv"></i>
                    <p>Registro de constancias de capacitación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="permisoadministrativo" onclick="solicitudpermisoadministrativo();">
                <a href="solicitudpermisoadministrativo">
                    <hr id="hr6">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Permiso administrativo menor a 30 días</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="formatoinduccion" onclick="formatoInduccionInstitucional();">
                <a href="evaluacionInduccionPuesto" target="_blank">
                    <hr id="hr6">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Formato de inducción institucional</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
        
            
        <?php

        } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuCapacitacion.php';

                $usernameSesion = $_SESSION['usuarioDatos'];
                ?>
                
                <script>
                        function solicitudpermisoadministrativo() {
                            window.location.href = 'solicitudpermisoadministrativo';
                        }
                        function evaluacion() {
                            window.location.href = '';
                        }
                        function planindividualcapacitacion() {
                            window.location.href = 'planindividualcapacitacion';
                        }
                        function capacitacionuseranual() {
                            window.location.href = 'capacitacionuseranual';
                        }
                        function creacionCursoCapacitacion() {
                    window.location.href ='creacionCursoCapacitacion';
                        }
                        function registroenventoscapacitacion() {
                            window.location.href = 'registroeventoscapacitacion';
                        }
                        function formatoInduccionInstitucional() {
                            window.location.href = 'evaluacionInduccionPuesto'
                        }
                    </script>
                    <?php
                        if ($usernameSesion == 'claehf@hotmail.com' ){ ?>
            <article class="card" id="creaciondecursos" onclick="creacionCursoCapacitacion();">
                <a href="creacionCursoCapacitacion" >
                    <hr id="hr6">
                    <i class="fa fa-cloud-upload" aria-hidden="true" id="iconosdiv"></i>
                    <p>Creación nuevo curso</p>
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
            <?php } ?>
                    <article class="card" id="creaciondecursos" onclick="capacitacionuseranual();">
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Programa anual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="planindividualcapacitacion" onclick="planindividualcapacitacion();">
                <a href="planindividualcapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-bookmark" aria-hidden="true" id="iconosdiv"></i>
                    <p>Registro de constancias de capacitación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="permisoadministrativo" onclick="solicitudpermisoadministrativo();">
                <a href="solicitudpermisoadministrativo">
                    <hr id="hr6">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Solicitud de permiso administrativo menor a 30 días</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="formatoinduccion" onclick="formatoInduccionInstitucional();">
                <a href="evaluacionInduccionPuesto">
                    <hr id="hr6">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Formato de inducción institucional</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
                    <?php
                
            } else if (isset($_SESSION['usuarioJefe'])) {
            require 'menu/menuCapacitacion.php';

            
                ?>
                    <script>
                        function solicitudpermisoadministrativo() {
                            window.location.href = 'solicitudpermisoadministrativo';
                        }
                        function evaluacion() {
                            window.location.href = '';
                        }
                        function planindividualcapacitacion() {
                            window.location.href = 'planindividualcapacitacion';
                        }
                        function capacitacionuseranual() {
                            window.location.href = 'capacitacionuseranual';
                        }
                    </script>
                    <article class="card" id="creaciondecursos" onclick="capacitacionuseranual();">
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Programa anual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="planindividualcapacitacion" onclick="planindividualcapacitacion();">
                <a href="planindividualcapacitacion">
                    <hr id="hr6">
                    <i class="fa fa-bookmark" aria-hidden="true" id="iconosdiv"></i>
                    <p>Registro de constancias de capacitación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="permisoadministrativo" onclick="solicitudpermisoadministrativo();">
                <a href="solicitudpermisoadministrativo">
                    <hr id="hr6">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" id="iconosdiv"></i>
                    <p>Solicitud de permiso administrativo menor a 30 días</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
        <?php
            
            }
        
        ?>

    </div>

    <script>

function estado()
{

	let status = $("#buscar").val();
	let ob = {status:status};
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

</html>