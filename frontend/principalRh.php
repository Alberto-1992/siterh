<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
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

    </header>

    <div class="gallery">

        <?php
        if (isset($_SESSION['usuarioAdmin'])) {
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
                
                    
                </script>
                
            <?php
            if (isset($_SESSION['usuarioAdmin'])) {
            $usernameSesion = $_SESSION['usuarioAdmin']; ?>
        
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

                <article class="card" id="estructura-organizacional" onclick="estructura();">
                    <a href="../rh/admin">
                        <hr id="hrestructura-organizacional">
                        <p>Módulo Usuarios</p>
                        <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                    </a>
                </article>



            <?php
            
        }
    } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuPersonal.php';

            ?>
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <p>Evaluación del Desempeño</p>
                    <a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>
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
                }
                ?>
                
                <?php
            }

        } else if (isset($_SESSION['usuarioJefe'])) {
            require 'menu/menuPersonal.php';
        ?>

            <article class="card" id="cursosDiplomas" onclick="evaluacion();">

                <hr id="hr6">
                <p>Evaluación del Desempeño</p>

                <a id="link" href="../rh/principal" class="btn btn-secondary">Evaluar</a>


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

                }
            }
        }
            ?>

    </div>
</body>

</html>