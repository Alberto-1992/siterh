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

<body style="background-color: azure;">

    <style>
        a {
            text-decoration: none;
        }
        
    </style>
    <header class="header" style="background-color: antiquewhite;">
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
        <span id="cabecera">Reclutamiento</span>

    </header>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <?php
    if (isset($_SESSION['usuarioAdminRh'])) { 
            include_once 'graficos/graficosCabeceraReclutamiento.php';
    
        //require 'graficos/graficosCapturas.php';
    }else if (isset($_SESSION['usuarioDatos'])) {
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
            include_once 'graficos/graficosCabeceraReclutamiento.php';
        }
    }
?>
 

    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            require 'menu/menuPrincipal.php';
        ?>

<script>
                        function reclutamiento() {
                            window.location.href = 'reclutamiento';
                        }
                        function evaluacion() {
                            window.location.href = 'enEvaluacion';
                        }
                        function documentos() {
                            window.location.href = 'documentacion';
                        }
                    </script>
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="reclutamiento">
                            <hr id="hr6">
                            <p>Reclutamiento y Selección</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="enevaluacion" onclick="evaluacion();">
                <a href="enEvaluacion">
                    <hr id="hr6">
                    <p>En evaluación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="endocumentacion" onclick="documentos();">
                <a href="documentacion">
                    <hr id="hr6">
                    <p>Carga de documentación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            
        <?php

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
                if ($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com') {
                ?>
                    <script>
                        function reclutamiento() {
                            window.location.href = 'reclutamiento';
                        }
                        function evaluacion() {
                            window.location.href = 'enEvaluacion';
                        }
                        function documentos() {
                            window.location.href = 'documentacion';
                        }
                    </script>
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="reclutamiento">
                            <hr id="hr6">
                            <p>Reclutamiento y Selección</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="enevaluacion" onclick="evaluacion();">
                <a href="enEvaluacion">
                    <hr id="hr6">
                    <p>En evaluación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="endocumentacion" onclick="documentos();">
                <a href="documentacion">
                    <hr id="hr6">
                    <p>Carga de documentación</p>
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
                if ($admin == 'brendacontreras@hotmail.com') {
                ?>
                    <script>
                        function reclutamiento() {
                            window.location.href = 'reclutamiento';
                        }
                        function evaluacion() {
                            window.location.href = 'enEvaluacion';
                        }
                        function documentos() {
                            window.location.href = 'documentacion';
                        }
                    </script>
                    <article class="card" id="reclutamiento" onclick="reclutamiento();">
                        <a href="reclutamiento">
                            <hr id="hr6">
                            <p>Reclutamiento y Selección</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <article class="card" id="enevaluacion" onclick="evaluacion();">
                <a href="enEvaluacion">
                    <hr id="hr6">
                    <p>En evaluación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                </a>
            </article>
            <article class="card" id="endocumentacion" onclick="documentos();">
                <a href="documentacion">
                    <hr id="hr6">
                    <p>Carga de documentación</p>
                    <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
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
    td{
        cursor: pointer;
        font-size: 12px;
    }
    td:hover{
        background-color: black;
        color: white;
    }
 
    </style>
    
    <div class="tablaBuscador" >
    <div class="col-md-2" >
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
    }else if (isset($_SESSION['usuarioDatos'])) {
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
    td{
        cursor: pointer;
        font-size: 12px;
    }
    td:hover{
        background-color: black;
        color: white;
    }
 
    </style>
    
    <div class="tablaBuscador" >
    <div class="col-md-2" >
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
    <script>

function estado()
{

	let status = $("#buscar").val();
	let ob = {status:status};
  $.ajax({
            type: "POST",
            url: "consultadataTableReclutamiento.php",
            data: ob,
                                                    
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