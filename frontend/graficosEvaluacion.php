<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Graficas evaluacion del desempeño</title>
</head>

<body>

    <div class="box1">
        <header class="headerinfarto">
        
            <span id="cabecera">Graficos de evaluación.</span>

        </header>
        <?php 
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuGraficos.php';
        break;
        default:
        
        require 'close_sesion.php';
        }
?>


        <script>
            /*
            $.ajax({
                url: 'consultaReclutamientoBusqueda.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
            $.ajax({
                url: 'consultaReclutamiento.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultadobus").html(resultado);
            })
*/
        </script>
        <div class="autoheight">
            <div id="tabla_resultado" class="adaptar" style="background-color: red; margin-top: 50px;"></div>
        </div>
    </div>

<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
</body>
</html>