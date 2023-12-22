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
        <span id="cabecera">Capacitación Anual</span>

    </header>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

 

    <div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
            $usernameSesion = $_SESSION['usuarioAdminRh'];
            error_reporting(0);
            require 'menu/menuCapacitacion.php';
            require 'conexionRh.php';
                        $sql = $conexionRh->prepare("SELECT plantillahraei.correo, plantillahraei.Empleado, personalcurso.id_empleado FROM plantillahraei inner join personalcurso on personalcurso.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                            $sql->execute(array(
                                ':correo'=>$usernameSesion
                            ));
                            $row = $sql->fetch();
                            $id = $row['id_empleado'];
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
                        function cursosasignados() {
                            window.location.href = 'cursosasignados';
                        }
                        function calendarioeventos() {
                            window.location.href = 'calendarioeventos';
                        }
                    </script>
                    <article class="card" id="calendariocapacitacion" onclick="calendarioeventos();">
                        <a href="calendarioeventos">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Calendario de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php 
                    if($id != ''){ ?>
                    <article class="card" id="cursosasigandos" onclick="cursosasignados();">
                        <a href="cursosasignados">
                            <hr id="hr6">
                            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                            <p>Plan individual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                        <?php }else{ ?>
                            <article class="card" id="sincursosasignados" >
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-times-circle" aria-hidden="true" id="iconosdiv"></i>
                            <p>Aun no tienes cursos asignados</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php } ?>
            
        <?php

        } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuCapacitacion.php';
            error_reporting(0);
                $usernameSesion = $_SESSION['usuarioDatos'];
                
                        require 'conexionRh.php';
                        $sql = $conexionRh->prepare("SELECT plantillahraei.correo, plantillahraei.Empleado, personalcurso.id_empleado FROM plantillahraei inner join personalcurso on personalcurso.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                            $sql->execute(array(
                                ':correo'=>$usernameSesion
                            ));
                            $row = $sql->fetch();
                            $id = $row['id_empleado'];
                    
                
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
                            window.open('capacitacionuseranual');
                        }
                        function cursosasignados() {
                            window.location.href = 'cursosasignados';
                        }
                        function calendarioeventos() {
                            window.location.href = 'calendarioeventos';
                        }
                    </script>
                    <article class="card" id="calendariocapacitacion" onclick="calendarioeventos();">
                        <a href="calendarioeventos">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Calendario de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php 
                    if($id != ''){ ?>
                    <article class="card" id="cursosasigandos" onclick="cursosasignados();">
                        <a href="cursosasignados">
                            <hr id="hr6">
                            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                            <p>Plan individual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php }else{ ?>
                            <article class="card" id="sincursosasignados" >
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-times-circle" aria-hidden="true" id="iconosdiv"></i>
                            <p>Aun no tienes cursos asignados</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php } ?>
            
                    <?php
                
            } else if (isset($_SESSION['usuarioJefe'])) {
                error_reporting(0);
            require 'menu/menuCapacitacion.php';

                    $usernameSesion = $_SESSION['usuarioJefe']; 
                    require 'conexionRh.php';
                        $sql = $conexionRh->prepare("SELECT plantillahraei.correo, plantillahraei.Empleado, personalcurso.id_empleado FROM plantillahraei inner join personalcurso on personalcurso.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
                            $sql->execute(array(
                                ':correo'=>$usernameSesion
                            ));
                            $row = $sql->fetch();
                            $id = $row['id_empleado'];
                    
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
                        function cursosasignados() {
                            window.location.href = 'cursosasignados';
                        }
                        function calendarioeventos() {
                            window.location.href = 'calendarioeventos';
                        }
                    </script>
                    <article class="card" id="calendariocapacitacion" onclick="calendarioeventos();">
                        <a href="calendarioeventos">
                            <hr id="hr6">
                            <i class="fa fa-calendar" aria-hidden="true" id="iconosdiv"></i>
                            <p>Calendario de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php 
                    if($id != ''){ ?>
                    <article class="card" id="cursosasigandos" onclick="cursosasignados();">
                        <a href="cursosasignados">
                            <hr id="hr6">
                            <i class="fa fa-book" aria-hidden="true" id="iconosdiv"></i>
                            <p>Plan individual de capacitación</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php }else{ ?>
                            <article class="card" id="sincursosasignados" >
                        <a href="capacitacionuseranual">
                            <hr id="hr6">
                            <i class="fa fa-times-circle" aria-hidden="true" id="iconosdiv"></i>
                            <p>Aun no tienes cursos asignados</p>
                            <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                        </a>
                    </article>
                    <?php } ?>
            
                    
        <?php
            
            }
        
        ?>

    </div>

    
</body>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    
</script>

</html>